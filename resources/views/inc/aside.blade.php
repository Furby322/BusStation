@section('aside')
    <h1> Отзыв </h1>

{{--    @foreach($data as $el)--}}
        <table class="table">
            <thead>
            <tr>
                <th>Имя посетителя</th>
                <?php
                    if (isset( $_POST['name']))
                        {?>
                            <th> {{ $_POST['name'] }} </th>
                        <?php };?>

            </tr>
            <tr>
                <th>Email</th>
                <?php
                    if (isset( $_POST['email']))
                        {?>
                            <th>{{ $_POST['email'] }}</th>
                        <?php }; ?>
            </tr>
            <tr>
                <th>Возраст</th>
                <?php
                    if (isset( $_POST['age']))
                        {?>
                            <th>{{ $_POST['age'] }}</th>
                        <?php }; ?>
            </tr>
            <tr>
                <th>Дата посещения</th>
                <?php
                    if (isset( $_POST['date']))
                        {?>
                            <th>{{ $_POST['date'] }}</th>
                        <?php }; ?>
            </tr>
            <tr>
                <th>Любимая кухня</th>
                <?php
                    if (isset( $_POST['country']))
                        {?>
                            <th>{{ $_POST['country'] }}</th>
                        <?php }; ?>
            </tr>
            <tr>
                <th>Рекомендация друзьям</th>
                <?php
                    if (isset( $_POST['recom']))
                        {?>
                            <th>{{ $_POST['recom'] }}</th>
                        <?php }; ?>
            </tr>
            <tr>
                <th>Отзыв</th>
                <?php
                    if (isset( $_POST['message']))
                        {?>
                            <th>{{ $_POST['message'] }}</th>
                        <?php }; ?>
            </tr>
            <tr>
                <th>Проверка</th>
                <th></th>
            </tr>
            </thead>
        </table>
{{--    @endforeach--}}
@show

