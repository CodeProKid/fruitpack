<?php

function fp_get_archive_field( $pt, $field ) {

	if ( ! $pt ) {
		return;
	}

	$ptObj = get_post_type_object( $pt );

	if ( ! $ptObj ) {
		return;
	}

	$field = get_field( $ptObj->name . $field, 'options' );

	return $field;

}

function fp_get_archive_title( $pt ) {

	$title = fp_get_archive_field( $pt, '_title' );

	if ( ! $title ) {
		$title = get_the_archive_title();
	}

	return $title;

}

function fp_get_archive_content( $pt ) {

	$content = fp_get_archive_field( $pt, '_content' );
	return $content;

}

function fp_get_archive_image( $pt, $size = 'large' ) {

	$heroArr = array();
	$heroImg = fp_get_archive_field( $pt, '_hero_image' );
	if ( $heroImg ) {
		$heroArr['alt'] = $heroImg['alt'];
		$heroArr['title'] = $heroImg['title'];
		$heroArr['src'] = $heroImg['sizes'][$size];
	}

	return $heroArr;

}