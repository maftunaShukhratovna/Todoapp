<?php
                /** @var TYPE_NAME $todos */

                foreach ($todos as $todo) {
                    if ($todo['status'] == 'completed') {
                        echo '
                                <li class="' . $todo['status'] . ' list-group-item d-flex justify-content-between align-items-center">
                            ' . $todo["title"] . '
                            <div>
                                <a href="/in-progress?id=' . $todo["id"] . '" class="btn btn-outline-primary"><i class="fa fa-hourglass-half"></i></a>
                            <a href="/pending?id=' . $todo["id"] . '" class="btn btn-outline-warning"><i class="fa fa-clock"></i></a> 
                            <a href="/delete?id=' . $todo["id"] . '" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            <a href="/edit?id=' . $todo["id"] . '" class="btn btn-outline-primary"><i class="fa fa-edit"></i></a>
                            </div>
                        </li>
                            ';
                    } elseif ($todo['status'] == 'pending') {
                        echo '
                                <li class="' . $todo['status'] . ' list-group-item d-flex justify-content-between align-items-center">
                            ' . $todo["title"] . '
                            <div>
                                <a href="/in-progress?id=' . $todo["id"] . '" class="btn btn-outline-primary"><i class="fa fa-hourglass-half"></i></a>
                            <a href="/complete?id=' . $todo["id"] . '" class="btn btn-outline-success"><i class="fa fa-check"></i></a>
                            <a href="/delete?id=' . $todo["id"] . '" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            <a href="/edit?id=' . $todo["id"] . '" class="btn btn-outline-primary"><i class="fa fa-edit"></i></a>
                            </div>
                        </li>
                            ';
                    } else {
                        echo '
                                <li class="' . $todo['status'] . ' list-group-item d-flex justify-content-between align-items-center">
                            ' . $todo["title"] . '
                            <div>
                                <a href="/pending?id=' . $todo["id"] . '" class="btn btn-outline-warning"><i class="fa fa-clock"></i></a>
                            <a href="/complete?id=' . $todo["id"] . '" class="btn btn-outline-success"><i class="fa fa-check"></i></a> 
                            <a href="/delete?id=' . $todo["id"] . '" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            <a href="/edit?id=' . $todo["id"] . '" class="btn btn-outline-primary"><i class="fa fa-edit"></i></a>
                            </div>
                        </li>
                            ';
                    }
                }

                ?>