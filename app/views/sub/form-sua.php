<form action="<?= BASE_URL . 'quiz/luu-cap-nhat?id=' . $model->id?>" method="post">
    <div>
        <label for="">Name</label>
        <input type="text" name="name" value="<?=$model->name ?>"><br>

        <label for="">Số phút</label>
        <input type="number" name="phut"value="<?=$model->duration_minutes ?>"><br>
        
        <input type="hidden" name="idsubject" value="<?=$_SESSION['subject_id']?>">
        <label for="">Thời gian bắt đầu</label>
          <input type="datetime-local" name="phutbd"value="<?=substr_replace($model->start_time,'T', 10, 1);  ?>" ><br>
       
        <label for="">Thời gian Kết thúc</label>
        <input type="datetime-local" name="phutkt"value="<?=substr_replace($model->end_time,'T', 10, 1);  ?>"><br>

        <label for="">Status</label>
        <input type="number" name="status"value="<?=$model->status ?>"><br>

        <label for="">is_shuffer</label>
        <input type="number" name="shuffle"value="<?=$model->is_shuffle ?>"><br>
    </div>
    <div>
        <button type="submit">Lưu</button>
    </div>
</form>