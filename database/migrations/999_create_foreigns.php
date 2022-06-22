<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('test', function (Blueprint $table) {
            $table->foreign('created_by', 'FK_test_created_by')
                ->references('id')->on('user')
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');
        });
        Schema::table('group', function (Blueprint $table) {
            $table->foreign('created_by', 'FK_group_created_by')
                ->references('id')->on('user')
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');
        });
        Schema::table('question', function (Blueprint $table) {
            $table->foreign('created_by', 'FK_question_created_by')
                ->references('id')->on('user')
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');
        });
        Schema::table('attachment', function (Blueprint $table) {
            $table->foreign('created_by', 'FK_attachment_created_by')
                ->references('id')->on('user')
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');
        });
        Schema::table('user_has_groups', function (Blueprint $table) {
            $table->foreign('user', 'FK_user_has_group_user')
                ->references('id')->on('user')
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');
            $table->foreign('group', 'FK_user_has_group_group')
                ->references('id')->on('group')
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');
        });
        Schema::table('test_has_groups', function (Blueprint $table) {
            $table->foreign('test', 'FK_test_has_group_test')
                ->references('id')->on('test')
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');
            $table->foreign('group', 'FK_test_has_group_group')
                ->references('id')->on('group')
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');
        });
        Schema::table('test_has_questions', function (Blueprint $table) {
            $table->foreign('test', 'FK_test_has_questions_test')
                ->references('id')->on('test')
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');
            $table->foreign('question', 'FK_test_has_questions_question')
                ->references('id')->on('question')
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');
        });
        Schema::table('question_has_attachments', function (Blueprint $table) {
            $table->foreign('question', 'FK_question_has_attachments_question')
                ->references('id')->on('question')
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');
            $table->foreign('attachment', 'FK_question_has_attachments_attachment')
                ->references('id')->on('attachment')
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('test', function (Blueprint $table) {
            $table->dropForeign('FK_test_created_by');
        });
        Schema::table('group', function (Blueprint $table) {
            $table->dropForeign('FK_group_created_by');
        });
        Schema::table('question', function (Blueprint $table) {
            $table->dropForeign('FK_question_created_by');
        });
        Schema::table('attachment', function (Blueprint $table) {
            $table->dropForeign('FK_attachment_created_by');
        });
        Schema::table('user_has_groups', function (Blueprint $table) {
            $table->dropForeign('FK_user_has_group_user');
            $table->dropForeign('FK_user_has_group_group');
        });
        Schema::table('test_has_groups', function (Blueprint $table) {
            $table->dropForeign('FK_test_has_group_test');
            $table->dropForeign('FK_test_has_group_group');
        });
        Schema::table('test_has_questions', function (Blueprint $table) {
            $table->dropForeign('FK_test_has_questions_test');
            $table->dropForeign('FK_test_has_questions_question');
        });
        Schema::table('question_has_attachments', function (Blueprint $table) {
            $table->dropForeign('FK_question_has_attachments_question');
            $table->dropForeign('FK_question_has_attachments_attachment');
        });
    }
};
