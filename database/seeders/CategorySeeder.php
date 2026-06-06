public function run()
{
    Category::insert([
        ['name' => 'Work'],
        ['name' => 'Personal'],
        ['name' => 'Health'],
        ['name' => 'School'],
    ]);
}
