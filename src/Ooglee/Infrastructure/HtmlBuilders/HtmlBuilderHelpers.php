<?php namespace Ooglee\Infrastructure\HtmlBuilders;

class HtmlBuilderHelpers 
{ 
    // Construct HTML for a Box
    public static function getBoxHTML($boxContent)
    {
        $html = '';
        if (empty($boxContent))
            return NULL;

        $html .= '<!-- Start_Box -->';

        $html .= '<div class="box box-info">';
        $html .= self::getBoxHeaderHTML($boxContent["header"]);
        $html .= '<div class="box-body">';
        $html .= self::getTableHTML($boxContent["table"]);
        $html .= '</div>';
        $html .= self::getBoxFooterHTML($boxContent["footer"]);
        $html .= '</div>';

        $html .= '<!-- End_Box -->';

        return $html;
    }

    // Construct HTML of all tables
    public static  function getTableHTML($tableData)
    {
        $html = '';
        if (empty($tableData))
            return NULL;

        $html .= '<!-- Start_Table_Responsive -->';
        $html .= '<div class="table-responsive">';
        $html .= '<table class="table no-margin">';

        $html .= '<thead>';
        $html .= '<tr>';

        foreach ($tableData["ths"] as $th) 
        {
            $html .= '<th>';
            $html .= $th;
            $html .= '</th>';
        }

        $html .= '</tr>';
        $html .= '</thead>';

        $html .= '<tbody>';
        $html .= '<tr>';

        foreach ($tableData["tbs"] as $tb) 
        {  
            foreach($tb as $t)
            {
                $html .= $t;
            }
        }

        $html .= '</tr>';
        $html .= '</tbody>';

        $html .= '</table>';
        $html .= '</div>';
        $html .= '<!-- End_Table_Responsive -->';

        return $html;   
    }

    // Construct HTML for a Box-Header
    public static function getBoxHeaderHTML($header)
    {
        $html = '';
        if (empty($header))
            return NULL;

        $html .= '<!-- Start_Box_Header -->';

        $html .= '<div class="box-header with-border">';
        $html .= '<h3 class="box-title">'.$header["title"].'</h3>';
        $html .= '<div class="box-tools pull-right">';
            $html .= '<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>';
            $html .= '<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>';
        $html .= '</div>';

        $html .= '<!-- End_Box_Header -->';

        return $html;
    }

    // Construct HTML for a Box-Footer
    public static function getBoxFooterHTML($footer)
    {
        $html = '';
        if (empty($footer))
            return NULL;

        $html .= '<!-- Start_Box_Footer -->';

        $html .= '<div class="box-footer clearfix">';
        $html .= '<a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">'.$footer["footerLeft"].'</a>';
        $html .= '<a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">'.$footer["footerRight"].'</a>';
        $html .= '</div>';

        $html .= '<!-- End_Box_Footer -->';


        return $html;
    }
}