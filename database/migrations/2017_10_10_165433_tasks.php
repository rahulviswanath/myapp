<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class Tasks extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    // task table
    Schema::create('tasks', function(Blueprint $table)
    {
      $table->increments('id');
      $table->string('description');
      $table->enum('status', ['New', 'In Progress','Closed']);
      $table->enum('type', ['Bug', 'Feature','Enhancement']);
      $table -> integer('assigned_to') -> unsigned() -> default(0);
      $table->foreign('assigned_to')
          ->references('id')->on('users')
          ->onDelete('cascade');
      $table->dateTime('created_at');
      $table->date('next_action_date');
      //$table->timestamps();
    });
  }
  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    // drop task table
    Schema::drop('tasks');
  }
}