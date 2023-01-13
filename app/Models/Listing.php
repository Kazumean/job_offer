<?php
    namespace App\Models;

    class Listing {
        public static function all () {
            return [
                [
                    'id' => 1,
                    'title' => 'Listing One',
                    'description' => 'Therefore, it follows that only you can ever know you and only I can ever know I directly. Between your consciousness and mine, there exists a wide gap that cannot be bridged. We may work together, live together, come to love or hate each other. But our mind can never be understood entirely by other people. We must live our own lives, think our own thoughts, and arrive at our own destiny.'
                ],
                [
                    'id' => 2,
                    'title' => 'Listing Two',
                    'description' => 'Therefore, it follows that only you can ever know you and only I can ever know I directly. Between your consciousness and mine, there exists a wide gap that cannot be bridged. We may work together, live together, come to love or hate each other. But our mind can never be understood entirely by other people. We must live our own lives, think our own thoughts, and arrive at our own destiny.'
                ]
                ];
        }

        public static function find($id) {
            $listings = self::all();

            foreach($listings as $listing) {
                if($listing['id'] == $id) {
                    return $listing;
                }
            }
        }
    }