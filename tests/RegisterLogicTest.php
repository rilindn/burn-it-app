<?php
use PHPUnit\Framework\TestCase;

class RegisterLogicTest extends TestCase
{
    private static $method;

    public static function setUpBeforeClass(): void
    {
        chdir(__DIR__ . '/../BurnIT/userLogic');
        require_once 'loginVerify.php';
        $class = new ReflectionClass('RegisterLogic');
        self::$method = $class->getMethod('dataCorrect');
        self::$method->setAccessible(true);
    }

    private function callDataCorrect($username, $email, $password, $password2)
    {
        $obj = new RegisterLogic([
            'register-username' => $username,
            'register-email' => $email,
            'register-password' => $password,
            'register-password2' => $password2
        ]);
        return self::$method->invoke($obj, $username, $email, $password, $password2);
    }

    public function testValidInput()
    {
        $result = $this->callDataCorrect('TestUser', 'test@example.com', 'Password1', 'Password1');
        $this->assertTrue($result);
    }

    public function testInvalidUsername()
    {
        $result = $this->callDataCorrect('Test User!', 'test@example.com', 'Password1', 'Password1');
        $this->assertFalse($result);
    }

    public function testInvalidEmail()
    {
        $result = $this->callDataCorrect('TestUser', 'invalid-email', 'Password1', 'Password1');
        $this->assertFalse($result);
    }

    public function testInvalidPassword()
    {
        $result = $this->callDataCorrect('TestUser', 'test@example.com', 'pass', 'pass');
        $this->assertFalse($result);
    }

    public function testPasswordMismatch()
    {
        $result = $this->callDataCorrect('TestUser', 'test@example.com', 'Password1', 'Password2');
        $this->assertFalse($result);
    }
}
