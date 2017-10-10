<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class Comments extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    // comments table
    Schema::create('comments', function(Blueprint $table)
    {
      $table->increments('id');
      $table -> integer('task_id') -> unsigned() -> default(0);
      $table->foreign('task_id')
          ->references('id')->on('tasks')
          ->onDelete('cascade');
      $table->text('comment'); 
      $table->date('date_added');
      $table->date('reminder_date');
      $table->timestamps();
    });
  }
  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    // drop comments table
    Schema::drop('comments');
  }
}