<?php

class SampleTest extends WP_UnitTestCase
{
	/**
	 * @test
	 */
	function do_shortcode()
	{
		$user = $this->factory->user->create( array(
				'role' => 'author',
		) );

		$this->assertSame(
			"<div class=\"row member-gravatars\"><div class=\"col-xs-6 col-sm-3 gravatars\" style=\"text-align: center; margin-bottom: 20px;\"><img alt='' src='http://0.gravatar.com/avatar/96614ec98aa0c0d2ee75796dced6df54?s=96&#038;d=mm&#038;r=g' srcset='http://0.gravatar.com/avatar/96614ec98aa0c0d2ee75796dced6df54?s=192&amp;d=mm&amp;r=g 2x' class='avatar avatar-96 photo' height='96' width='96' /><br>admin</div><div class=\"col-xs-6 col-sm-3 gravatars\" style=\"text-align: center; margin-bottom: 20px;\"><img alt='' src='http://0.gravatar.com/avatar/0adcdca8ae9043dc6597f7f4dab80522?s=96&#038;d=mm&#038;r=g' srcset='http://0.gravatar.com/avatar/0adcdca8ae9043dc6597f7f4dab80522?s=192&amp;d=mm&amp;r=g 2x' class='avatar avatar-96 photo' height='96' width='96' /><br>User 1</div></div>",
			do_shortcode( '[gravatars]' )
		);

		$this->assertSame(
			"<div class=\"row member-gravatars\"><div class=\"col-xs-6 col-sm-3 gravatars\" style=\"text-align: center; margin-bottom: 20px;\"><img alt='' src='http://0.gravatar.com/avatar/96614ec98aa0c0d2ee75796dced6df54?s=96&#038;d=mm&#038;r=g' srcset='http://0.gravatar.com/avatar/96614ec98aa0c0d2ee75796dced6df54?s=192&amp;d=mm&amp;r=g 2x' class='avatar avatar-96 photo' height='96' width='96' /><br>admin</div><div class=\"col-xs-6 col-sm-3 gravatars\" style=\"text-align: center; margin-bottom: 20px;\"><img alt='' src='http://0.gravatar.com/avatar/0adcdca8ae9043dc6597f7f4dab80522?s=96&#038;d=mm&#038;r=g' srcset='http://0.gravatar.com/avatar/0adcdca8ae9043dc6597f7f4dab80522?s=192&amp;d=mm&amp;r=g 2x' class='avatar avatar-96 photo' height='96' width='96' /><br>User 1</div></div>",
			do_shortcode( '[gravatars who="administrators"]' )
		);
	}
}
