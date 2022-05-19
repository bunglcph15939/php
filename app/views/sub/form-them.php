<form action="<?= BASE_URL . 'quiz/luu-tao-moi'?>" method="post">
    <div>
        <label for="">Name</label>
        <input type="text" name="name"><br>

        <label for="">Số phút</label>
        <input type="number" name="phut"><br>
        
        <input type="hidden" name="idsubject" value="<?=$_SESSION['subject_id']?>">
        <label for="">Thời gian bắt đầu</label>
          <input type="datetime-local" name="phutbd"><br>

        <label for="">Thời gian Kết thúc</label>
        <input type="datetime-local" name="phutkt"><br>
       
        <label for="">Status</label>
        <input type="number" name="status"><br>

        <label for="">is_shuffer</label>
        <input type="number" name="shuffle"><br>
    </div>
    <div>
        <button type="submit">Lưu</button>
    </div>
</form>