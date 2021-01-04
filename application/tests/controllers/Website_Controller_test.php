<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website_Controller_test extends TestCase {

    /**
     * Testing class object data
     *
     * @var Website_Controller
     */
    private $class_object;

    /**
     * Website test setup method
     */
    public function setUp()
    {
        $this->class_object = $this->newController('Website_Controller');
    }

    /**
     * Testing public methods
     */
    public function test_public_methods()
    {
        $this->assertNull($this->class_object->index());
        $this->assertNull($this->class_object->about());
        $this->assertNull($this->class_object->projects());
        $this->assertNull($this->class_object->contact());
    }

    /**
     * Testing contact_us method
     */
    public function test_contact_us_method()
    {
        $result = $this->class_object->contact_us();

        $this->assertNull($result);

        $output = $this->request('POST', 'contact_us', array(
            'name'    => 'Zlatan',
            'email'   => 'contact@zlatanstajic.com',
            'subject' => 'space-prospection',
            'message' => 'This is PHPUnit test message',
        ));

        $this->assertEquals('NO', $output);
    }

    /**
     * Testing alpha_space_only method
     */
    public function test_alpha_space_only_method()
    {
        $result = $this->class_object->alpha_space_only('space-prospection');

        $this->assertNull($result);

        $result = $this->class_object->alpha_space_only('spaceprospection');

        $this->assertTrue($result);
    }

}
