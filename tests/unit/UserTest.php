<?php

use PHPUnit\Framework\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    private $_user;

    public function __construct()
    {
        parent::__construct();
        $this->_user = new User();
    }

    public function testWeCanGetFirstName()
    {
        // create User
        // set First Name
        $_firstName = 'Hooman';

        $this->_user->setFirstName($_firstName);
        // test get first name
        $this->assertEquals($this->_user->getFirstName(),$_firstName);
    }

    public function testWeCanGetLastName()
    {
        $_lastName = 'Doe';
        $this->_user->setLastName($_lastName);
        $this->assertEquals($this->_user->getLastName(),$_lastName);
    }

    public function testFullNameIsReturned()
    {
        $_firstName = 'Hooman';
        $_lastName = 'Doe';

        $this->_user->setFirstName($_firstName);
        $this->_user->setLastName($_lastName);

        $this->assertEquals($this->_user->getFullName(), sprintf('%s %s',$_firstName, $_lastName));


    }

    public function testFirstAndLastNameIsTrimmed()
    {
        $_firstName = ' Hooman';
        $_lastName = 'Doe ';

        $this->_user->setFirstName($_firstName);
        $this->_user->setLastName($_lastName);

        $this->assertEquals($this->_user->getFirstName(), 'Hooman');
        $this->assertEquals($this->_user->getLastName(), 'Doe');

    }

    public function testEmailAddressCanBeSet()
    {
        $this->_user->setEmail('strong@gmail.com');

        $this->assertEquals($this->_user->getEmail(),'strong@gmail.com');
    }

    /**
     * @test
     */
    public function emailVariablesContainCorrectValue()
    {
        $_firstName = ' Hooman';
        $_lastName = 'Doe ';

        $this->_user->setFirstName($_firstName);
        $this->_user->setLastName($_lastName);
        $this->_user->setEmail('hooman@gmail.com');

        $emailVariables = $this->_user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals($emailVariables['full_name'], 'Hooman Doe');
        $this->assertEquals($emailVariables['email'], 'hooman@gmail.com');

    }
}
