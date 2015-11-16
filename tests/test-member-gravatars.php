<?php

class SampleTest extends WP_UnitTestCase
{
	/**
	 * @test
	 */
	function do_shortcode()
	{
		$user_id = $this->factory->user->create( array(
				'role' => 'author',
		) );

		$user_id = $this->factory->user->create( array(
				'role' => 'subscriber ',
		) );

		// should get all users
		$this->assertContains(
			'admin',
			do_shortcode( '[gravatars who=""]' )
		);

		$this->assertContains(
			'User 1',
			do_shortcode( '[gravatars who=""]' )
		);

		$this->assertContains(
			'User 2',
			do_shortcode( '[gravatars who=""]' )
		);

		$this->assertContains(
			'admin',
			do_shortcode( '[gravatars who="authors"]' )
		);

		$this->assertContains(
			'User 1',
			do_shortcode( '[gravatars who="authors"]' )
		);

		// User 2 should not be there.
		$this->assertFalse(
			!! preg_match( '/User 2/', do_shortcode( '[gravatars who="authors"]' ) )
		);
	}
}
