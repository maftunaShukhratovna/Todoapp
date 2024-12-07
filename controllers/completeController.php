<?php
(new App\Todo())->complete($todoId);
redirect('/todos');