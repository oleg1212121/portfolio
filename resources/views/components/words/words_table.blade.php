<div class="row mb-4 no-gutters">
    <div class="col">
        <div class="table-responsive">
            <table class="words table table-striped hide_answer">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Слово</th>
                    <th>Перевод</th>
                    <th>Выуч.</th>
                    <th>Зап.</th>
                    <th class="  mobile_hiding">Повт.</th>
                    <th class=" mobile_hiding">Уточн.</th>
                    <th class=" mobile_hiding">Испр.</th>
                    <th class=" mobile_hiding">Удал.</th>
                </tr>
                </thead>
                <tbody>
                @foreach($words as $item)
                    @component('components.words.words_table_row', ['item' => $item, 'index' => $loop->index + 1])@endcomponent
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('words_table_row_scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            let tBody = document.querySelector('tbody');
            tBody.addEventListener('click', function (e) {
                let button = e.target;
                let token = document.getElementsByName('_token')[0].value;

                // Change word's status
                if (button.classList.contains("mark_word")) {
                    $.ajax({
                        type: "POST",
                        url: `/mark_word/${button.getAttribute('data-id')}?argument=${button.getAttribute('data-argument')}`,
                        data: {},
                        headers: {
                            'X-CSRF-Token': token
                        },
                        success: function (res) {
                            button.closest('tr').remove();
                        },
                        error: function (error) {
                            alert('Что-то пошло не так.');
                        }
                    });
                }

                // Translate word
                if (button.classList.contains("translate_word")) {
                    let textarea = button.closest('tr').querySelector('textarea');
                    $.ajax({
                        type: "POST",
                        url: '/translate_word/' + button.getAttribute('data-id'),
                        data: {},
                        headers: {
                            'X-CSRF-Token': token
                        },
                        success: function (res) {
                            textarea.value = res.answer;
                        },
                        error: function (error) {
                            alert('Что-то пошло не так.');
                        }
                    });
                }

                // Update word
                if (button.classList.contains("update_word")) {
                    let textarea = button.closest('tr').querySelector('textarea');
                    $.ajax({
                        type: "POST",
                        url: '/update_word/' + button.getAttribute('data-id'),
                        data: {'translate': textarea.value},
                        headers: {
                            'X-CSRF-Token': token
                        },
                        success: function (res) {
                            textarea.value = res.answer;
                        },
                        error: function (error) {
                            alert('Что-то пошло не так.');
                        }
                    });
                }

                // delete word
                if (button.classList.contains("delete_word")) {
                    $.ajax({
                        type: "POST",
                        url: '/delete_word/' + button.getAttribute('data-id'),
                        data: {},
                        headers: {
                            'X-CSRF-Token': token
                        },
                        success: function () {
                            button.closest('tr').remove();
                        },
                        error: function (error) {
                            alert('Что-то пошло не так.');
                        }
                    });
                }
            });
        });
    </script>
@endpush