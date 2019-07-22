1.composer create-project --prefer-dist laravel/laravel MEBS
    //Creating New Project(MEBS)
2.php artisan make:model Student -mcr
    //Creating New Model (App/Student.php),
    Controller (App/Http/Controller/StudentController.php),
    Migration(Database/migrations/2019_07_19_124122_create_students_table.php)
    And Resourses(StudentController.php{
    index(),
    create(),
    store(Request $request),
    show(Student $student),
    edit(Student $student),
    update(Request $request,
    Student $student),
    destroy(Student $student)
    })
    Some Changes in migrations has been done by developer.
    2019_07_19_124122_create_students_table.php{
      $table->String('s_id');
      $table->String('name');
      $table->String('department');
      $table->String('photo');
    }
    And
    .env
    {
    DB_SOCKET=/Applications/MAMP/tmp/mysql/mysql.sock
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=8889
    DB_DATABASE=MEBS
    DB_USERNAME=root
    DB_PASSWORD=root
    }
    And
    2014_10_12_000000_create_users_table.php{
    $table->String('type');
    }



3.php artisan migrate
    //execute all migrations after editing

4.php artisan make:controller FrontendConroller

5.php artisan storage:link
    //To create link in public folder
