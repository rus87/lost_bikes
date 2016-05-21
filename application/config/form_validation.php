<?php
$config = array(
            'add_bike' => array(
                array(
                'field' => 'frame',
                'label' => 'Байк/рама',
                'rules' => 'trim|required|min_length[3]|max_length[50]'
                ),
                array(
                'field' => 'frame_serial',
                'label' => 'Первые 4 символа серийного номера',
                'rules' => 'max_length[4]|alpha_numeric'
                ),
                array(
                'field' => 'fork',
                'label' => 'Байк/рама',
                'rules' => 'trim|max_length[50]'
                ),
                array(
                'field' => 'amort',
                'label' => 'Амортизатор',
                'rules' => 'trim|max_length[50]'
                ),
                array(
                'field' => 'break_rear',
                'label' => 'Задний тормоз',
                'rules' => 'trim|max_length[50]'
                ),
                array(
                'field' => 'break_front',
                'label' => 'Передний тормоз',
                'rules' => 'trim|max_length[50]'
                ),
                array(
                'field' => 'crankset',
                'label' => 'Система',
                'rules' => 'trim|max_length[50]'
                ),
                array(
                'field' => 'der_front',
                'label' => 'Передняя перекидка',
                'rules' => 'trim|max_length[50]'
                ),
                array(
                'field' => 'der_rear',
                'label' => 'Задняя перекидка',
                'rules' => 'trim|max_length[50]'
                ),
                array(
                'field' => 'cassette',
                'label' => 'Кассета',
                'rules' => 'trim|max_length[50]'
                ),
                array(
                'field' => 'sleeve_front',
                'label' => 'Передняя втулка',
                'rules' => 'trim|max_length[50]'
                ),
                array(
                'field' => 'sleeve_rear',
                'label' => 'Задняя втулка',
                'rules' => 'trim|max_length[50]'
                ),
                array(
                'field' => 'rims',
                'label' => 'Обода',
                'rules' => 'trim|max_length[50]'
                ),
                array(
                'field' => 'tire_front',
                'label' => 'Передняя покрышка',
                'rules' => 'trim|max_length[50]'
                ),
                array(
                'field' => 'tire_rear',
                'label' => 'Задняя покрышка',
                'rules' => 'trim|max_length[50]'
                ),
                array(
                'field' => 'chainguide',
                'label' => 'Успокоитель цепи',
                'rules' => 'trim|max_length[50]'
                ),
                array(
                'field' => 'handlebar',
                'label' => 'Руль',
                'rules' => 'trim|max_length[50]'
                ),
                array(
                'field' => 'stem',
                'label' => 'Вынос',
                'rules' => 'trim|max_length[50]'
                ),
                array(
                'field' => 'location',
                'label' => 'Город',
                'rules' => 'trim|max_length[50]|required'
                ),
                array(
                'field' => 'comment',
                'label' => 'Комментарий',
                'rules' => 'trim|max_length[2000]'
                ),
            )
        );