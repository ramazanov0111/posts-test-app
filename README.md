запрос 1:

curl -X GET http://localhost/api/feed/{userId}
где userId = от 1 до 100 любое число

Ответ:

[
    {
        "id": 2248,
        "title": "Molestiae dolorem hic incidunt.",
        "content": "Beatae et delectus qui ullam. Illum rem reprehenderit non pariatur quos. Dolores et quia quia omnis. Aut temporibus et sint voluptas itaque atque.\n\nEos assumenda sit quo quia cumque commodi. Aliquid ipsum rerum quas veritatis quidem qui ut. Blanditiis sunt dolores ut magnam corrupti. Velit quia quibusdam quod.",
        "hotness": 1,
        "views_count": 607,
        "created_at": "2024-10-12T09:56:46.000000Z"
    },
    {
        "id": 2072,
        "title": "Neque voluptatem expedita dignissimos est dolorem id.",
        "content": "Animi atque id voluptatem dolorem officia. Modi dolorem deleniti numquam excepturi facere ut voluptates. Rem qui non fuga autem. Quia ex ad ipsa porro consequatur numquam enim.\n\nQuidem rerum et enim exercitationem quae. Quod dolores ut excepturi. Architecto aut dolores vel incidunt. Placeat officiis quae in doloribus animi.",
        "hotness": 1,
        "views_count": 778,
        "created_at": "2024-09-01T08:28:08.000000Z"
    }
]


запрос 2:

curl -X POST -H "Content-Type: application/json" \
     -d '{"post_id": 123, "user_id": 11}' \
     http://localhost/api/view

Ответ:

{"status": "success"}
