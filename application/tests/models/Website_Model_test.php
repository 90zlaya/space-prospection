<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website_Model_Test extends TestCase {

    /**
     * Testing class object data
     *
     * @var Website_model
     */
    private $class_object;

    /**
     * Website test setup method
     */
    public function setUp()
    {
        $this->class_object = $this->newModel('Website_model');
    }

    /**
     * Testing navigation method
     */
    public function test_navigation_method()
    {
        $result = $this->class_object->navigation();

        $this->assertNotEmpty($result);
        $this->assertInternalType('array', $result);

        foreach ($result as $item)
        {
            $this->assertArrayHasKey('name', $item);
            $this->assertArrayHasKey('link', $item);
        }
    }

    /**
     * Testing social_links method
     */
    public function test_social_links_method()
    {
        $result = $this->class_object->social_links();

        $this->assertNotEmpty($result);
        $this->assertInternalType('array', $result);

        foreach ($result as $item)
        {
            $this->assertArrayHasKey('name', $item);
            $this->assertArrayHasKey('link', $item);
        }
    }

    /**
     * Testing projects method
     */
    public function test_projects_method()
    {
        $result = $this->class_object->projects();

        $this->assertNotEmpty($result);
        $this->assertInternalType('array', $result);

        foreach ($result as $item)
        {
            $this->assertArrayHasKey('title', $item);
            $this->assertArrayHasKey('description', $item);
            $this->assertArrayHasKey('image', $item);
        }
    }

}
