<div class="col-md-8 order-md-1">
    <h4 class="mb-3">Лабораторная работа №1</h4>
    <form class="needs-validation" novalidate="">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="Name">Вашее имя</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                <div class="invalid-feedback">
                    Valid first name is required.
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Email">
            <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
            </div>
        </div>

        <div class="mb-3">
            <label for="address">Ваш возраст</label>
            <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
            <div class="invalid-feedback">
                Please enter your shipping address.
            </div>
        </div>

        <div class="mb-3">
            <label for="address2">Дата посещения </label>
            <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
        </div>

        <div class="row">
            <div class="col-md-5 mb-3">
                <label for="country">Любимая кухня</label>
                <select class="custom-select d-block w-100" id="country" required="">
                    <option value="">Ваш выбор...</option>
                    <option>Русская</option>
                    <option>Украинская</option>
                    <option>Итальянская</option>
                </select>
                <div class="invalid-feedback">
                    Please select a valid country.
                </div>
            </div>
        </div>
        <hr class="mb-4">

        <h4 class="mb-3">Рекомендуете нас друзьям? </h4>

        <div class="d-block my-3">
            <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                <label class="custom-control-label" for="credit">Да</label>
            </div>
            <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                <label class="custom-control-label" for="debit">Нет</label>
            </div>
        </div>

        <div class="">

        </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Оставить отзыв</button>
    </form>
</div>