<?php

use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{


    /**
     * @test
     */
    public function empty_instanced_collection_return_no_items()
    {
        $collection = new \App\Support\Collection;

        $this->assertEmpty($collection->get());
    }
    
    /**
     * @test
     */
    public function count_is_correct_for_items_passed_in()
    {
        $collection = new \App\Support\Collection([
            'one', 'two', 'three'
        ]);

        $this->assertEquals(3, $collection->count());
    }

    /**
     * @test
     */
    public function items_return_match_items_passed_in()
    {
        $collection = new \App\Support\Collection([
            'one', 'two', 'three', 'four'
        ]);
        $this->assertCount(4, $collection->get());

        $this->assertEquals($collection->get()[0], 'one');
        $this->assertEquals($collection->get()[3], 'four');
    }
    
    /** @test */
    public function collection_is_instance_of_iterator_aggregate()
    {
        $collection = new \App\Support\Collection;

        $this->assertInstanceOf(IteratorAggregate::class,$collection);
    }

    /**
     * @test
     * @description iterated -> loop
     */
    public function collection_can_be_iterated()
    {
        $collection = new \App\Support\Collection([
            'one', 'two', 'three', 'four'
        ]);

        $items = [];

        foreach ($collection as $item) {
            $items[] = $item;
        }

        $this->assertCount(4, $items);
        $this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());
    }

    /** @test */
    public function collection_can_be_merge_into_collection()
    {
        $collection1 = new \App\Support\Collection(['one', 'two']);
        $collection2 = new \App\Support\Collection(['three', 'four', 'six']);

        $collection1->merge($collection2);

        $this->assertCount(5, $collection1->get());
        $this->assertEquals(5, $collection1->count());
    }
    
    /** @test */
    public function can_add_to_existing_collection()
    {
        $collection = new \App\Support\Collection(['one', 'two']);

        $collection->add(['new items']);

        $this->assertEquals(3, $collection->count());
        $this->assertCount(3, $collection->get());

    }
}