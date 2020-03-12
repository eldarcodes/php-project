<form>
    <img src="/assets/img/photo_2020-03-12_22-13-50.jpg" width="300" class="mb-3" alt="Profile">
    <div class="card-title row">
        <div class="col-2">Имя:</div>
        <input type="text" value="<?php echo $_SESSION['user']['name']; ?>" class="form-control col-3">
    </div>
    <div class="card-title row">
        <div class="col-2">Фамилия:</div>
        <input type="text" value="<?php echo $_SESSION['user']['surname']; ?>" class="form-control col-3">
    </div>
    <div class="card-text mb-3 row">
        <div class="col-2">Ваша почта:</div>
        <input class="form-control col-3 d-inline-block" type="text" value="<?php echo $_SESSION['user']['email']; ?>">
    </div>
    <div class="card-text mb-3 row">
        <div class="col-2">Родной город:</div>
        <input class="form-control col-3 d-inline-block" type="text" />
    </div>
    <div class="card-text mb-3 row">
        <div class="col-2">Пол:</div>
        <select class="custom-select col-3">
            <option selected>Мужской</option>
            <option value="1">Женский</option>
        </select>
    </div>
    <div class="card-text mb-3 row">
        <div class="col-2">Дата рождения:</div>
        <input type="date" class="form-control d-inline-block col-3">
    </div>

    <a href="#" class="btn btn-primary ">Сохранить</a>
    <a href="#" class="btn btn-primary ml-2">Отменить</a>
</form>