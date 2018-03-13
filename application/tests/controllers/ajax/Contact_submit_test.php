<?php

class Contact_Submit_Test extends TestCase {

    // -------------------------------------------------------------------------

    /**
    * Testing class object data
    *
    * @var Contact_submit
    */
    private $class_object;

    // -------------------------------------------------------------------------

    /**
    * Website test setup method
    */
    public function setUp()
    {
        $this->class_object = $this->newController('Contact_submit');
    }

    // -------------------------------------------------------------------------

    /**
    * Testing contact_us method
    */
    public function test_contact_us_method()
    {
        $this->assertNull($this->class_object->contact_us());
    }

    // -------------------------------------------------------------------------

    /**
    * Testing alpha_space_only method
    */
    public function test_alpha_space_only_method()
    {
        $result = $this->class_object->alpha_space_only('space-prospection');

        $this->assertFalse($result);

        $result = $this->class_object->alpha_space_only('spaceprospection');

        $this->assertTrue($result);
    }

    // -------------------------------------------------------------------------
}
