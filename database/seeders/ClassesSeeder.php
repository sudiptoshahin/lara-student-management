<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use \App\Models\Classes;
use \App\Models\Section;
use \App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Sequence;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Classes::factory()
        //     ->count(10)
        //     ->sequence(fn($sequence) => ["name" => 'Class '.$sequence->index + 1])
        //     ->has(
        //         Section::factory()
        //             ->count(2)
        //             ->state(
        //                 new Sequence(
        //                     ["name" => "Section A"],
        //                     ["name" => "Section B"]
        //                 )
        //             )
        //             ->has(
        //                 Student::factory()
        //                     ->count(5)
        //                     ->state(
        //                         function (Section $section) {
        //                             return ['class_id' => $section->class_id];
        //                         }
        //                     )
        //             )
        //     )->create();
        Classes::factory()
            ->count(10) // Generate 10 classes
            ->sequence(fn ($sequence) => ['name' => 'Class ' . ($sequence->index + 1)])
            ->has(
                Section::factory()
                    ->count(3) // Each class has 3 sections
                    ->sequence(
                        ['name' => 'Section A'],
                        ['name' => 'Section B'],
                        ['name' => 'Section C']
                    )
                    ->has(
                        Student::factory()
                            ->count(5) // Each section has 5 students
                            ->state(function (array $attributes, Section $section) {
                                return [
                                    'class_id' => $section->class_id, // Assign the same class_id as the section
                                    'section_id' => $section->id, // Assign the section_id
                                ];
                            })
                    )
            )
            ->create();

    }
}
