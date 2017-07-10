<?php
/*
* Resize images dynamically using wp built in functions.
* If file exists not recreating and serving old file.
* If $width is passed as a string function will look for wordpress sizes.
*
* php 5.2+
*
* Examples use in template:
* get_size(img.ID, 'thumbnail' )  -> getting the thumnail image from wordpress
* get_size(img.ID, 1600 )  ->  resizing width at 1600, height is auto
* get_size(img.ID, 1600 , 1600, true )  ->  cropping image 1600,1600
*
* @param int $attach_id
* @param int/string $width
* @param int $height (optional)
* @param bool $crop (optional)
* @return array
*/

function get_size ($attach_id = null, $width, $height=false, $crop = false) {

       if (empty($attach_id)) {
            echo 'The attachement ID provided is empty. Please provided the attachement id';
            return false;
        }

        // If width is passed as  string check for wordpress image sizes
        if (is_string ( $width )) {
            $image = wp_get_attachment_image_src($attach_id, $width);
            if ($image) {
                $image_data = (object) array(
                    'url' => wp_make_link_relative($image[0]) ,
                    'width' => $image[1],
                    'height' => $image[2],
                    'alt' => get_post_meta( $attach_id, '_wp_attachment_image_alt', true)
                );
                return $image_data;
            } else {
                  echo 'The image of size ' . $width . 'was not found' ;
                  return false;
            }
        }

        // get original image information
        $old_img_url = get_attached_file( $attach_id );
        $old_img_info = pathinfo( $old_img_url );
        $old_img_ext = '.'. $old_img_info['extension'];
        $old_img_path = $old_img_info['dirname'] .'/'. $old_img_info['filename'];
        $new_img_dir = str_replace(ABSPATH, '/', $old_img_info['dirname']);

        // If no height is passed write proper filename
        if ($height) {
            $new_img_name_extension  = '-'. $width .'x'. $height . $old_img_ext;
        } else {
            $new_img_name_extension  = '-'. $width . $old_img_ext;
        }

        // The absolute path to the new image
        $new_img_path = $old_img_path . $new_img_name_extension;

        // The relative path to the new image
        $wp_image_location =  dirname( wp_make_link_relative( wp_get_attachment_url($attach_id) ) );
        $old_image_date = filemtime ( $old_img_url );
        if (file_exists($new_img_path) ) {
            $new_image_date = filemtime ( $new_img_path );
        } else {
            $new_image_date = 0;
        }

        // the file exists already, do not recreate
        if ( file_exists($new_img_path) && $old_image_date < $new_image_date ) {
            $new_img = wp_get_image_editor( $old_img_path . $new_img_name_extension );
            $sizes = $new_img->get_size();
            $image_data = (object) array(
                'url' => $wp_image_location .'/'. $old_img_info['filename'] . $new_img_name_extension ,
                'width' => $sizes['width'],
                'height' => $sizes['height']
            );

        // If file is not existing create it
        } else {

            // Create the new image
            $new_img = wp_get_image_editor( $old_img_url );
            $new_img->resize( $width, $height, $crop );
            $new_img = $new_img->save( $new_img_path );

            // return new image data
            $image_data = (object) array(
                'url' => $wp_image_location .'/'. $new_img['file'],
                'width' => $new_img['width'],
                'height' => $new_img['height'],
                'alt' => get_post_meta( $attach_id, '_wp_attachment_image_alt', true)
            );
        }
        return $image_data;
}
