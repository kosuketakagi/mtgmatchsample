<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['スタンダード', 'モダン', 'レガシー', '統率者','Pauper','パイオニア','旧枠モダン','ドラフト','シールド','その他'];
        foreach ($tags as $tag) App\Tag::create(['name' => $tag]);
    }
}
