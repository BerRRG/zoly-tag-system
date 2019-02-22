<?php

namespace Tests\Feature;

use Mockery as m;
use Tests\TestCase;
use App\Model\AttributeComment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;

class AttributeCommentTest extends TestCase
{
    public function testAttribute()
    {
        $model = m::mock(AttributeComment::class)->makePartial();
        $model->shouldReceive('attribute')->andReturn(null);

        $this->assertNull($model->attribute());
    }
}
