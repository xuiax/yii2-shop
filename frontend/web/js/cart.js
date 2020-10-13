class Cart {
    constructor(conf) {
        this.action_add = conf.action_add;
        this.action_delete = conf.action_delete;
        this.action_get_all = conf.action_get_all;
        this.csrf_token = conf.csrf_token;
    }

    add(id, count, properties) {
        this.item = {
            id: id,
            count: count,
            properties: properties
        };
        this.addCart();
    }

    addCart() {
        $.ajax({
            url: this.action_add,
            type: "POST",
            beforeSend: (xhr) => {
                xhr.setRequestHeader("X-CSRF-Token", this.csrf_token)
            },
            contentType: 'application/json',
            dataType: 'json',
            async: false,
            data: JSON.stringify(this.item),
            success: function (msg) {

            }
        });
    }
}