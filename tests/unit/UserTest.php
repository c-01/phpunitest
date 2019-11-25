<?php

use PHPUnit\Framework\TestCase;
use App\Models\User;

class UserTest extends TestCase
{

    public function testWeCanGetFirstName()
    {
        // create User
        $user = new User;
        // set First Name
        $_firstName = 'Hooman';

        $user->setFirstName($_firstName);
        // test get first name
        $this->assertEquals($user->getFirstName(),$_firstName);
    }

    public function testWeCanGetLastName()
    {
        $user = new User;
        $_lastName = 'Doe';
        $user->setLastName($_lastName);
        $this->assertEquals($user->getLastName(),$_lastName);
    }

    public function testFullNameIsReturned()
    {
        $user = new User;
        $_firstName = 'Hooman';
        $_lastName = 'Doe';

        $user->setFirstName($_firstName);
        $user->setLastName($_lastName);

        $this->assertEquals($user->getFullName(), sprintf('%s %s',$_firstName, $_lastName));


    }

    public function testFirstAndLastNameIsTrimmed()
    {
        $user = new User;
        $_firstName = ' Hooman';
        $_lastName = 'Doe ';

        $user->setFirstName($_firstName);
        $user->setLastName($_lastName);

        $this->assertEquals($user->getFirstName(), 'Hooman');
        $this->assertEquals($user->getLastName(), 'Doe');

    }
}
