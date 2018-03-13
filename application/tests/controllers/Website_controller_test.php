<?php

class Website_Controller_Test extends TestCase {

    // -------------------------------------------------------------------------

    /**
    * Testing class object data
    *
    * @var Website_controller
    */
    private $class_object;

    // -------------------------------------------------------------------------

    /**
    * Website test setup method
    */
    public function setUp()
    {
        $this->class_object = $this->newController('Website_controller');
    }

    // -------------------------------------------------------------------------

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

    // -------------------------------------------------------------------------
}
