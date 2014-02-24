<?php
    class BreedsTableSeeder extends Seeder {
        public function run(){
            DB::table('breeds')->insert(array(
                array('id'=>1, 'name'=>"Bulldog"),
                array('id'=>2, 'name'=>"Beagle"),
                array('id'=>3, 'name'=>"Poodle"),
            ));
        }
    }

?>