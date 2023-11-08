$(document).ready(function () {
    $('#cpf').mask('000.000.000-00', {reverse: true})

    $('#numberCard').on('change', function () {
        let valid = $('#numberCard').validateCreditCard({ accept: ['visa', 'mastercard', 'amex'] })
        if(! valid.valid) {
            $('#invalidCard').show(7)
        } else {
            $('#invalidCard').hide(6)
        }
    })


    $('#saveCard').submit(function (event) {
        event.preventDefault()
        $('#btnSubmit').prop('disabled', true)

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/cartao',
            method: 'post',
            data: $(this).serialize(),
            success: (res => {
                $('#btnSubmit').prop('disabled', true)
                response(res.message, res.type, res.title)
                $('#saveCard').trigger('reset')
            }),
            error: (err => {
                let res = err.responseJSON
                if(err.status  === 400 || err.status === 422) {
                    res.type = 'warning'
                }

                if(err.status >= 500 && err.status <= 599) {
                    res.type = 'error'
                }

                response(res.message, res.type, res.title)
                $('#btnSubmit').prop('disabled', false)
            })
        })

        setTimeout(() => {
            $('#btnSubmit').prop('disabled', false)
        }, 4000)
    })


    const response = (message, type, title) => {
        return Swal.fire({
            icon: type,
            title: title,
            text: message,
        }).then( () => {
            location.reload()
        })
    }
})
