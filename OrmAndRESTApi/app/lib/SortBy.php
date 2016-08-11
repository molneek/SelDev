<?php

namespace Lib;

class SortBy
{

    /**
     * Previous checking and creation sorting expression.
     *
     * @param $get
     * @return array
     */
    public function sortBy($get) {
        if(!empty($get)) {
            return $this->_formingGetRequest($get);
        } else {
            return $this->_formingGetRequest();
        }
    }

    /**
     * Implement sorting on panel page.
     *
     * @param resource $get
     * @return array $orderBy
     */
    private function _formingGetRequest($get = null)
    {
        $validate = new Validate();
        if(null !== $get) {
            $_SESSION['subject'] = $validate->clearInput($get['subject']);
            $_SESSION['method'] = $validate->clearInput($get['method']);
            if(!empty($get['page'])) {
                $_SESSION['page'] = $validate->clearInput($get['page']);
            } else {
                $_SESSION['page'] = 1;
            }
            $_SESSION['onPage'] = $validate->clearInput($get['onPage']);
        }

        if(!empty($_SESSION['subject']) && !empty($_SESSION['method'])) {
            if($_SESSION['subject'] == 'price') {
                $orderBy['subject'] = 'final_price_with_tax';
            } else {
                $orderBy['subject'] = $_SESSION['subject'];
            }

            $orderBy['method'] = $_SESSION['method'];
        } else {
            $orderBy['subject'] = 'name';
            $orderBy['method'] = 'ASC';
            $_SESSION['page'] = 1;
            $_SESSION['onPage'] = 15;
        }
        return $orderBy;
    }
}
