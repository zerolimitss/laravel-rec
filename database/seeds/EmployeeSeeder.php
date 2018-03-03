<?php

use App\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    private $levels = 4;
    private $currentLevel = 0;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $f = \Faker\Factory::create();

        //========= boss
        $m = new Employee();
        $m->name = $f->firstName . " " . $f->lastName;
        $m->position = $f->jobTitle;
        $m->date = $f->dateTimeBetween('-10 years', 'now');
        $m->salary = rand(1,10) . "000";
        $m->boss = 0;
        $m->save();

        //========= others

        $this->addEmployee([$m->id]);
    }

    private function addEmployee($parents)
    {
        if($this->currentLevel++ > $this->levels) return;
        $arr = [];
        foreach ($parents as $item) {
            for($i = 0; $i < $this->levels; $i++){
                $f = \Faker\Factory::create();
                $m = new Employee();
                $m->name = $f->firstName . " " . $f->lastName;
                $m->position = $f->jobTitle;
                $m->date = $f->dateTimeBetween('-10 years', 'now');
                $m->salary = rand(1,10) . "000";
                $m->boss = $item;
                $m->save();
                $arr[] = $m->id;
            }
        }
        $this->addEmployee($arr);
    }
}
