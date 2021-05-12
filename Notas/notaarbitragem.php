<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *                                   ATTENTION!
 * If you see this message in your browser (Internet Explorer, Mozilla Firefox, Google Chrome, etc.)
 * this means that PHP is not properly installed on your web server. Please refer to the PHP manual
 * for more details: http://php.net/manual/install.php 
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

    include_once dirname(__FILE__) . '/components/startup.php';
    include_once dirname(__FILE__) . '/components/application.php';
    include_once dirname(__FILE__) . '/' . 'authorization.php';


    include_once dirname(__FILE__) . '/' . 'database_engine/mysql_engine.php';
    include_once dirname(__FILE__) . '/' . 'components/page/page_includes.php';

    function GetConnectionOptions()
    {
        $result = GetGlobalConnectionOptions();
        $result['client_encoding'] = 'utf8';
        GetApplication()->GetUserAuthentication()->applyIdentityToConnectionOptions($result);
        return $result;
    }

    
    
    
    // OnBeforePageExecute event handler
    
    
    
    class notaarbitragemPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->SetTitle('Pontuação Arbitragem');
            $this->SetMenuLabel('Pontuação Arbitragem');
    
            $this->dataset = new TableDataset(
                MySqlIConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`notaarbitragem`');
            $this->dataset->addFields(
                array(
                    new StringField('Categoria', true, true),
                    new StringField('Nome Central', true),
                    new StringField('Nota Central', true),
                    new StringField('Nome Lateral 1', true),
                    new StringField('Nota Lateral 1', true),
                    new StringField('Nome Lateral 2', true),
                    new StringField('Nota Lateral 2', true),
                    new StringField('Nome Lateral 3', true),
                    new StringField('Nota Lateral 3', true),
                    new StringField('Nome Lateral 4', true),
                    new StringField('Nota Lateral 4', true)
                )
            );
        }
    
        protected function DoPrepare() {
    
        }
    
        protected function CreatePageNavigator()
        {
            $result = new CompositePageNavigator($this);
            
            $partitionNavigator = new PageNavigator('pnav', $this, $this->dataset);
            $partitionNavigator->SetRowsPerPage(120);
            $result->AddPageNavigator($partitionNavigator);
            
            return $result;
        }
    
        protected function CreateRssGenerator()
        {
            return null;
        }
    
        protected function setupCharts()
        {
    
        }
    
        protected function getFiltersColumns()
        {
            return array(
                new FilterColumn($this->dataset, 'Categoria', 'Categoria', 'Categoria'),
                new FilterColumn($this->dataset, 'Nome Central', 'Nome Central', 'Central'),
                new FilterColumn($this->dataset, 'Nota Central', 'Nota Central', 'C_Nota'),
                new FilterColumn($this->dataset, 'Nome Lateral 1', 'Nome Lateral 1', 'Lateral 1'),
                new FilterColumn($this->dataset, 'Nota Lateral 1', 'Nota Lateral 1', 'L1_Nota'),
                new FilterColumn($this->dataset, 'Nome Lateral 2', 'Nome Lateral 2', 'Lateral 2'),
                new FilterColumn($this->dataset, 'Nota Lateral 2', 'Nota Lateral 2', 'L2_Nota'),
                new FilterColumn($this->dataset, 'Nome Lateral 3', 'Nome Lateral 3', 'Lateral 3'),
                new FilterColumn($this->dataset, 'Nota Lateral 3', 'Nota Lateral 3', 'L3_Nota'),
                new FilterColumn($this->dataset, 'Nome Lateral 4', 'Nome Lateral 4', 'Lateral 4'),
                new FilterColumn($this->dataset, 'Nota Lateral 4', 'Nota Lateral 4', 'L4_Nota')
            );
        }
    
        protected function setupQuickFilter(QuickFilter $quickFilter, FixedKeysArray $columns)
        {
            $quickFilter
                ->addColumn($columns['Categoria'])
                ->addColumn($columns['Nome Central'])
                ->addColumn($columns['Nota Central'])
                ->addColumn($columns['Nome Lateral 1'])
                ->addColumn($columns['Nota Lateral 1'])
                ->addColumn($columns['Nome Lateral 2'])
                ->addColumn($columns['Nota Lateral 2'])
                ->addColumn($columns['Nome Lateral 3'])
                ->addColumn($columns['Nota Lateral 3'])
                ->addColumn($columns['Nome Lateral 4'])
                ->addColumn($columns['Nota Lateral 4']);
        }
    
        protected function setupColumnFilter(ColumnFilter $columnFilter)
        {
            $columnFilter
                ->setOptionsFor('Categoria')
                ->setOptionsFor('Nome Central')
                ->setOptionsFor('Nota Central')
                ->setOptionsFor('Nome Lateral 1')
                ->setOptionsFor('Nota Lateral 1')
                ->setOptionsFor('Nome Lateral 2')
                ->setOptionsFor('Nota Lateral 2')
                ->setOptionsFor('Nome Lateral 3')
                ->setOptionsFor('Nota Lateral 3')
                ->setOptionsFor('Nome Lateral 4')
                ->setOptionsFor('Nota Lateral 4');
        }
    
        protected function setupFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
            $main_editor = new ComboBox('categoria_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $main_editor->addChoice('01 - KATA INDIVIDUAL MASCULINO IDADE 5 A 8 ANOS FAIXA(S) BRANCA E LARANJA', '01 - KATA INDIVIDUAL MASCULINO IDADE 5 A 8 ANOS FAIXA(S) BRANCA E LARANJA');
            $main_editor->addChoice('02 - KATA INDIVIDUAL MASCULINO IDADE 5 A 8 ANOS FAIXA(S) AZUL E AMARELA', '02 - KATA INDIVIDUAL MASCULINO IDADE 5 A 8 ANOS FAIXA(S) AZUL E AMARELA');
            $main_editor->addChoice('03 - KATA INDIVIDUAL MASCULINO IDADE 9 A 11 ANOS FAIXA(S) BRANCA E LARANJA', '03 - KATA INDIVIDUAL MASCULINO IDADE 9 A 11 ANOS FAIXA(S) BRANCA E LARANJA');
            $main_editor->addChoice('04 - KATA INDIVIDUAL MASCULINO IDADE 9 A 11 ANOS FAIXA(S) AZUL E AMARELA', '04 - KATA INDIVIDUAL MASCULINO IDADE 9 A 11 ANOS FAIXA(S) AZUL E AMARELA');
            $main_editor->addChoice('05 - KATA INDIVIDUAL MASCULINO IDADE 9 A 11 ANOS FAIXA(S) VERDE E MARROM', '05 - KATA INDIVIDUAL MASCULINO IDADE 9 A 11 ANOS FAIXA(S) VERDE E MARROM');
            $main_editor->addChoice('06 - KATA INDIVIDUAL MASCULINO IDADE 12 A 14 ANOS FAIXA(S) BRANCA E LARANJA', '06 - KATA INDIVIDUAL MASCULINO IDADE 12 A 14 ANOS FAIXA(S) BRANCA E LARANJA');
            $main_editor->addChoice('07 - KATA INDIVIDUAL MASCULINO IDADE 12 A 14 ANOS FAIXA(S) AZUL E AMARELA', '07 - KATA INDIVIDUAL MASCULINO IDADE 12 A 14 ANOS FAIXA(S) AZUL E AMARELA');
            $main_editor->addChoice('08 - KATA INDIVIDUAL MASCULINO IDADE 12 A 14 ANOS FAIXA(S) VERDE E MARROM', '08 - KATA INDIVIDUAL MASCULINO IDADE 12 A 14 ANOS FAIXA(S) VERDE E MARROM');
            $main_editor->addChoice('09 - KATA INDIVIDUAL MASCULINO IDADE 12 A 14 ANOS FAIXA(S) PRETA', '09 - KATA INDIVIDUAL MASCULINO IDADE 12 A 14 ANOS FAIXA(S) PRETA');
            $main_editor->addChoice('10 - KATA INDIVIDUAL MASCULINO IDADE 15 A 17 ANOS FAIXA(S) BRANCA E LARANJA', '10 - KATA INDIVIDUAL MASCULINO IDADE 15 A 17 ANOS FAIXA(S) BRANCA E LARANJA');
            $main_editor->addChoice('11 - KATA INDIVIDUAL MASCULINO IDADE 15 A 17 ANOS FAIXA(S) AZUL E AMARELA', '11 - KATA INDIVIDUAL MASCULINO IDADE 15 A 17 ANOS FAIXA(S) AZUL E AMARELA');
            $main_editor->addChoice('12 - KATA INDIVIDUAL MASCULINO IDADE 15 A 17 ANOS FAIXA(S) VERDE E MARROM', '12 - KATA INDIVIDUAL MASCULINO IDADE 15 A 17 ANOS FAIXA(S) VERDE E MARROM');
            $main_editor->addChoice('13 - KATA INDIVIDUAL MASCULINO IDADE 15 A 17 ANOS FAIXA(S) PRETA', '13 - KATA INDIVIDUAL MASCULINO IDADE 15 A 17 ANOS FAIXA(S) PRETA');
            $main_editor->addChoice('14 - KATA INDIVIDUAL MASCULINO IDADE 18 A 23 ANOS FAIXA(S) BRANCA E LARANJA', '14 - KATA INDIVIDUAL MASCULINO IDADE 18 A 23 ANOS FAIXA(S) BRANCA E LARANJA');
            $main_editor->addChoice('15 - KATA INDIVIDUAL MASCULINO IDADE 18 A 23 ANOS FAIXA(S) AZUL E AMARELA', '15 - KATA INDIVIDUAL MASCULINO IDADE 18 A 23 ANOS FAIXA(S) AZUL E AMARELA');
            $main_editor->addChoice('16 - KATA INDIVIDUAL MASCULINO IDADE 18 A 23 ANOS FAIXA(S) VERDE E MARROM', '16 - KATA INDIVIDUAL MASCULINO IDADE 18 A 23 ANOS FAIXA(S) VERDE E MARROM');
            $main_editor->addChoice('17 - KATA INDIVIDUAL MASCULINO IDADE 18 A 23 ANOS FAIXA(S) PRETA', '17 - KATA INDIVIDUAL MASCULINO IDADE 18 A 23 ANOS FAIXA(S) PRETA');
            $main_editor->addChoice('18 - KATA INDIVIDUAL MASCULINO IDADE 24 A 29 ANOS FAIXA(S) BRANCA E LARANJA', '18 - KATA INDIVIDUAL MASCULINO IDADE 24 A 29 ANOS FAIXA(S) BRANCA E LARANJA');
            $main_editor->addChoice('19 - KATA INDIVIDUAL MASCULINO IDADE 24 A 29 ANOS FAIXA(S) AZUL E AMARELA', '19 - KATA INDIVIDUAL MASCULINO IDADE 24 A 29 ANOS FAIXA(S) AZUL E AMARELA');
            $main_editor->addChoice('20 - KATA INDIVIDUAL MASCULINO IDADE 24 A 29 ANOS FAIXA(S) VERDE E MARROM', '20 - KATA INDIVIDUAL MASCULINO IDADE 24 A 29 ANOS FAIXA(S) VERDE E MARROM');
            $main_editor->addChoice('21 - KATA INDIVIDUAL MASCULINO IDADE 24 A 29 ANOS FAIXA(S) PRETA', '21 - KATA INDIVIDUAL MASCULINO IDADE 24 A 29 ANOS FAIXA(S) PRETA');
            $main_editor->addChoice('22 - KATA INDIVIDUAL MASCULINO IDADE 30 A 35 ANOS FAIXA(S) BRANCA E LARANJA', '22 - KATA INDIVIDUAL MASCULINO IDADE 30 A 35 ANOS FAIXA(S) BRANCA E LARANJA');
            $main_editor->addChoice('23 - KATA INDIVIDUAL MASCULINO IDADE 30 A 35 ANOS FAIXA(S) AZUL E AMARELA', '23 - KATA INDIVIDUAL MASCULINO IDADE 30 A 35 ANOS FAIXA(S) AZUL E AMARELA');
            $main_editor->addChoice('24 - KATA INDIVIDUAL MASCULINO IDADE 30 A 35 ANOS FAIXA(S) VERDE E MARROM', '24 - KATA INDIVIDUAL MASCULINO IDADE 30 A 35 ANOS FAIXA(S) VERDE E MARROM');
            $main_editor->addChoice('25 - KATA INDIVIDUAL MASCULINO IDADE 30 A 35 ANOS FAIXA(S) PRETA', '25 - KATA INDIVIDUAL MASCULINO IDADE 30 A 35 ANOS FAIXA(S) PRETA');
            $main_editor->addChoice('26 - KATA INDIVIDUAL MASCULINO IDADE 36 A 43 ANOS FAIXA(S) BRANCA E LARANJA', '26 - KATA INDIVIDUAL MASCULINO IDADE 36 A 43 ANOS FAIXA(S) BRANCA E LARANJA');
            $main_editor->addChoice('27 - KATA INDIVIDUAL MASCULINO IDADE 36 A 43 ANOS FAIXA(S) AZUL E AMARELA', '27 - KATA INDIVIDUAL MASCULINO IDADE 36 A 43 ANOS FAIXA(S) AZUL E AMARELA');
            $main_editor->addChoice('28 - KATA INDIVIDUAL MASCULINO IDADE 36 A 43 ANOS FAIXA(S) VERDE E MARROM', '28 - KATA INDIVIDUAL MASCULINO IDADE 36 A 43 ANOS FAIXA(S) VERDE E MARROM');
            $main_editor->addChoice('29 - KATA INDIVIDUAL MASCULINO IDADE 36 A 43 ANOS FAIXA(S) PRETA', '29 - KATA INDIVIDUAL MASCULINO IDADE 36 A 43 ANOS FAIXA(S) PRETA');
            $main_editor->addChoice('30 - KATA INDIVIDUAL MASCULINO IDADE 44 A 52 ANOS FAIXA(S) BRANCA E LARANJA', '30 - KATA INDIVIDUAL MASCULINO IDADE 44 A 52 ANOS FAIXA(S) BRANCA E LARANJA');
            $main_editor->addChoice('31 - KATA INDIVIDUAL MASCULINO IDADE 44 A 52 ANOS FAIXA(S) AZUL E AMARELA', '31 - KATA INDIVIDUAL MASCULINO IDADE 44 A 52 ANOS FAIXA(S) AZUL E AMARELA');
            $main_editor->addChoice('32 - KATA INDIVIDUAL MASCULINO IDADE 44 A 52 ANOS FAIXA(S) VERDE E MARROM', '32 - KATA INDIVIDUAL MASCULINO IDADE 44 A 52 ANOS FAIXA(S) VERDE E MARROM');
            $main_editor->addChoice('33 - KATA INDIVIDUAL MASCULINO IDADE 44 A 52 ANOS FAIXA(S) PRETA', '33 - KATA INDIVIDUAL MASCULINO IDADE 44 A 52 ANOS FAIXA(S) PRETA');
            $main_editor->addChoice('34 - KATA INDIVIDUAL MASCULINO IDADE 53 A 59 ANOS FAIXA(S) BRANCA E LARANJA', '34 - KATA INDIVIDUAL MASCULINO IDADE 53 A 59 ANOS FAIXA(S) BRANCA E LARANJA');
            $main_editor->addChoice('35 - KATA INDIVIDUAL MASCULINO IDADE 53 A 59 ANOS FAIXA(S) AZUL E AMARELA', '35 - KATA INDIVIDUAL MASCULINO IDADE 53 A 59 ANOS FAIXA(S) AZUL E AMARELA');
            $main_editor->addChoice('36 - KATA INDIVIDUAL MASCULINO IDADE 53 A 59 ANOS FAIXA(S) VERDE E MARROM', '36 - KATA INDIVIDUAL MASCULINO IDADE 53 A 59 ANOS FAIXA(S) VERDE E MARROM');
            $main_editor->addChoice('37 - KATA INDIVIDUAL MASCULINO IDADE 53 A 59 ANOS FAIXA(S) PRETA', '37 - KATA INDIVIDUAL MASCULINO IDADE 53 A 59 ANOS FAIXA(S) PRETA');
            $main_editor->addChoice('38 - KATA INDIVIDUAL FEMININO IDADE 5 A 8 ANOS FAIXA(S) BRANCA E LARANJA', '38 - KATA INDIVIDUAL FEMININO IDADE 5 A 8 ANOS FAIXA(S) BRANCA E LARANJA');
            $main_editor->addChoice('39 - KATA INDIVIDUAL FEMININO IDADE 5 A 8 ANOS FAIXA(S) AZUL E AMARELA', '39 - KATA INDIVIDUAL FEMININO IDADE 5 A 8 ANOS FAIXA(S) AZUL E AMARELA');
            $main_editor->addChoice('40 - KATA INDIVIDUAL FEMININO IDADE 9 A 11 ANOS FAIXA(S) BRANCA E LARANJA', '40 - KATA INDIVIDUAL FEMININO IDADE 9 A 11 ANOS FAIXA(S) BRANCA E LARANJA');
            $main_editor->addChoice('41 - KATA INDIVIDUAL FEMININO IDADE 9 A 11 ANOS FAIXA(S) AZUL E AMARELA', '41 - KATA INDIVIDUAL FEMININO IDADE 9 A 11 ANOS FAIXA(S) AZUL E AMARELA');
            $main_editor->addChoice('42 - KATA INDIVIDUAL FEMININO IDADE 9 A 11 ANOS FAIXA(S) VERDE E MARROM', '42 - KATA INDIVIDUAL FEMININO IDADE 9 A 11 ANOS FAIXA(S) VERDE E MARROM');
            $main_editor->addChoice('43 - KATA INDIVIDUAL FEMININO IDADE 12 A 14 ANOS FAIXA(S) BRANCA E LARANJA', '43 - KATA INDIVIDUAL FEMININO IDADE 12 A 14 ANOS FAIXA(S) BRANCA E LARANJA');
            $main_editor->addChoice('44 - KATA INDIVIDUAL FEMININO IDADE 12 A 14 ANOS FAIXA(S) AZUL E AMARELA', '44 - KATA INDIVIDUAL FEMININO IDADE 12 A 14 ANOS FAIXA(S) AZUL E AMARELA');
            $main_editor->addChoice('45 - KATA INDIVIDUAL FEMININO IDADE 12 A 14 ANOS FAIXA(S) VERDE E MARROM', '45 - KATA INDIVIDUAL FEMININO IDADE 12 A 14 ANOS FAIXA(S) VERDE E MARROM');
            $main_editor->addChoice('46 - KATA INDIVIDUAL FEMININO IDADE 12 A 14 ANOS FAIXA(S) PRETA', '46 - KATA INDIVIDUAL FEMININO IDADE 12 A 14 ANOS FAIXA(S) PRETA');
            $main_editor->addChoice('47 - KATA INDIVIDUAL FEMININO IDADE 15 A 17 ANOS FAIXA(S) BRANCA E LARANJA', '47 - KATA INDIVIDUAL FEMININO IDADE 15 A 17 ANOS FAIXA(S) BRANCA E LARANJA');
            $main_editor->addChoice('48 - KATA INDIVIDUAL FEMININO IDADE 15 A 17 ANOS FAIXA(S) AZUL E AMARELA', '48 - KATA INDIVIDUAL FEMININO IDADE 15 A 17 ANOS FAIXA(S) AZUL E AMARELA');
            $main_editor->addChoice('49 - KATA INDIVIDUAL FEMININO IDADE 15 A 17 ANOS FAIXA(S) VERDE E MARROM', '49 - KATA INDIVIDUAL FEMININO IDADE 15 A 17 ANOS FAIXA(S) VERDE E MARROM');
            $main_editor->addChoice('50 - KATA INDIVIDUAL FEMININO IDADE 15 A 17 ANOS FAIXA(S) PRETA', '50 - KATA INDIVIDUAL FEMININO IDADE 15 A 17 ANOS FAIXA(S) PRETA');
            $main_editor->addChoice('51 - KATA INDIVIDUAL FEMININO IDADE 18 A 23 ANOS FAIXA(S) BRANCA E LARANJA', '51 - KATA INDIVIDUAL FEMININO IDADE 18 A 23 ANOS FAIXA(S) BRANCA E LARANJA');
            $main_editor->addChoice('52 - KATA INDIVIDUAL FEMININO IDADE 18 A 23 ANOS FAIXA(S) AZUL E AMARELA', '52 - KATA INDIVIDUAL FEMININO IDADE 18 A 23 ANOS FAIXA(S) AZUL E AMARELA');
            $main_editor->addChoice('53 - KATA INDIVIDUAL FEMININO IDADE 18 A 23 ANOS FAIXA(S) VERDE E MARROM', '53 - KATA INDIVIDUAL FEMININO IDADE 18 A 23 ANOS FAIXA(S) VERDE E MARROM');
            $main_editor->addChoice('54 - KATA INDIVIDUAL FEMININO IDADE 18 A 23 ANOS FAIXA(S) PRETA', '54 - KATA INDIVIDUAL FEMININO IDADE 18 A 23 ANOS FAIXA(S) PRETA');
            $main_editor->addChoice('55 - KATA INDIVIDUAL FEMININO IDADE 24 A 29 ANOS FAIXA(S) BRANCA E LARANJA', '55 - KATA INDIVIDUAL FEMININO IDADE 24 A 29 ANOS FAIXA(S) BRANCA E LARANJA');
            $main_editor->addChoice('56 - KATA INDIVIDUAL FEMININO IDADE 24 A 29 ANOS FAIXA(S) AZUL E AMARELA', '56 - KATA INDIVIDUAL FEMININO IDADE 24 A 29 ANOS FAIXA(S) AZUL E AMARELA');
            $main_editor->addChoice('57 - KATA INDIVIDUAL FEMININO IDADE 24 A 29 ANOS FAIXA(S) VERDE E MARROM', '57 - KATA INDIVIDUAL FEMININO IDADE 24 A 29 ANOS FAIXA(S) VERDE E MARROM');
            $main_editor->addChoice('58 - KATA INDIVIDUAL FEMININO IDADE 24 A 29 ANOS FAIXA(S) PRETA', '58 - KATA INDIVIDUAL FEMININO IDADE 24 A 29 ANOS FAIXA(S) PRETA');
            $main_editor->addChoice('59 - KATA INDIVIDUAL FEMININO IDADE 30 A 35 ANOS FAIXA(S) BRANCA E LARANJA', '59 - KATA INDIVIDUAL FEMININO IDADE 30 A 35 ANOS FAIXA(S) BRANCA E LARANJA');
            $main_editor->addChoice('60 - KATA INDIVIDUAL FEMININO IDADE 30 A 35 ANOS FAIXA(S) AZUL E AMARELA', '60 - KATA INDIVIDUAL FEMININO IDADE 30 A 35 ANOS FAIXA(S) AZUL E AMARELA');
            $main_editor->addChoice('61 - KATA INDIVIDUAL FEMININO IDADE 30 A 35 ANOS FAIXA(S) VERDE E MARROM', '61 - KATA INDIVIDUAL FEMININO IDADE 30 A 35 ANOS FAIXA(S) VERDE E MARROM');
            $main_editor->addChoice('62 - KATA INDIVIDUAL FEMININO IDADE 30 A 35 ANOS FAIXA(S) PRETA', '62 - KATA INDIVIDUAL FEMININO IDADE 30 A 35 ANOS FAIXA(S) PRETA');
            $main_editor->addChoice('63 - KATA INDIVIDUAL FEMININO IDADE 36 A 43 ANOS FAIXA(S) BRANCA E LARANJA', '63 - KATA INDIVIDUAL FEMININO IDADE 36 A 43 ANOS FAIXA(S) BRANCA E LARANJA');
            $main_editor->addChoice('64 - KATA INDIVIDUAL FEMININO IDADE 36 A 43 ANOS FAIXA(S) AZUL E AMARELA', '64 - KATA INDIVIDUAL FEMININO IDADE 36 A 43 ANOS FAIXA(S) AZUL E AMARELA');
            $main_editor->addChoice('65 - KATA INDIVIDUAL FEMININO IDADE 36 A 43 ANOS FAIXA(S) VERDE E MARROM', '65 - KATA INDIVIDUAL FEMININO IDADE 36 A 43 ANOS FAIXA(S) VERDE E MARROM');
            $main_editor->addChoice('66 - KATA INDIVIDUAL FEMININO IDADE 36 A 43 ANOS FAIXA(S) PRETA', '66 - KATA INDIVIDUAL FEMININO IDADE 36 A 43 ANOS FAIXA(S) PRETA');
            $main_editor->addChoice('67 - KATA INDIVIDUAL FEMININO IDADE 44 A 52 ANOS FAIXA(S) BRANCA E LARANJA', '67 - KATA INDIVIDUAL FEMININO IDADE 44 A 52 ANOS FAIXA(S) BRANCA E LARANJA');
            $main_editor->addChoice('68 - KATA INDIVIDUAL FEMININO IDADE 44 A 52 ANOS FAIXA(S) AZUL E AMARELA', '68 - KATA INDIVIDUAL FEMININO IDADE 44 A 52 ANOS FAIXA(S) AZUL E AMARELA');
            $main_editor->addChoice('69 - KATA INDIVIDUAL FEMININO IDADE 44 A 52 ANOS FAIXA(S) VERDE E MARROM', '69 - KATA INDIVIDUAL FEMININO IDADE 44 A 52 ANOS FAIXA(S) VERDE E MARROM');
            $main_editor->addChoice('70 - KATA INDIVIDUAL FEMININO IDADE 44 A 52 ANOS FAIXA(S) PRETA', '70 - KATA INDIVIDUAL FEMININO IDADE 44 A 52 ANOS FAIXA(S) PRETA');
            $main_editor->addChoice('71 - KATA INDIVIDUAL FEMININO IDADE 53 A 59 ANOS FAIXA(S) BRANCA E LARANJA', '71 - KATA INDIVIDUAL FEMININO IDADE 53 A 59 ANOS FAIXA(S) BRANCA E LARANJA');
            $main_editor->addChoice('72 - KATA INDIVIDUAL FEMININO IDADE 53 A 59 ANOS FAIXA(S) AZUL E AMARELA', '72 - KATA INDIVIDUAL FEMININO IDADE 53 A 59 ANOS FAIXA(S) AZUL E AMARELA');
            $main_editor->addChoice('73 - KATA INDIVIDUAL FEMININO IDADE 53 A 59 ANOS FAIXA(S) VERDE E MARROM', '73 - KATA INDIVIDUAL FEMININO IDADE 53 A 59 ANOS FAIXA(S) VERDE E MARROM');
            $main_editor->addChoice('74 - KATA INDIVIDUAL FEMININO IDADE 53 A 59 ANOS FAIXA(S) PRETA', '74 - KATA INDIVIDUAL FEMININO IDADE 53 A 59 ANOS FAIXA(S) PRETA');
            $main_editor->addChoice('75 - KATA INDIVIDUAL MISTO IDADE 5 A 8 ANOS FAIXA(S) ABSOLUTO', '75 - KATA INDIVIDUAL MISTO IDADE 5 A 8 ANOS FAIXA(S) ABSOLUTO');
            $main_editor->addChoice('76 - KATA INDIVIDUAL MISTO IDADE 9 A 11 ANOS FAIXA(S) ABSOLUTO', '76 - KATA INDIVIDUAL MISTO IDADE 9 A 11 ANOS FAIXA(S) ABSOLUTO');
            $main_editor->addChoice('78 - KATA INDIVIDUAL MISTO IDADE 12 A 14 ANOS FAIXA(S) ABSOLUTO', '78 - KATA INDIVIDUAL MISTO IDADE 12 A 14 ANOS FAIXA(S) ABSOLUTO');
            $main_editor->addChoice('80 - KATA INDIVIDUAL MISTO IDADE 15 A 17 ANOS FAIXA(S) ABSOLUTO', '80 - KATA INDIVIDUAL MISTO IDADE 15 A 17 ANOS FAIXA(S) ABSOLUTO');
            $main_editor->addChoice('81 - KATA INDIVIDUAL MISTO IDADE 18 A 59 ANOS FAIXA(S) ABSOLUTO', '81 - KATA INDIVIDUAL MISTO IDADE 18 A 59 ANOS FAIXA(S) ABSOLUTO');
            $main_editor->addChoice('83 - KATA EQUIPE MASCULINO IDADE 5 A 14 ANOS FAIXA(S) - FAIXA(S) ABSOLUTO', '83 - KATA EQUIPE MASCULINO IDADE 5 A 14 ANOS FAIXA(S) - FAIXA(S) ABSOLUTO');
            $main_editor->addChoice('84 - KATA EQUIPE FEMININO IDADE 5 A 14 ANOS FAIXA(S) - FAIXA(S) ABSOLUTO', '84 - KATA EQUIPE FEMININO IDADE 5 A 14 ANOS FAIXA(S) - FAIXA(S) ABSOLUTO');
            $main_editor->addChoice('85 - KATA EQUIPE MASCULINO IDADE 15 A 59 ANOS FAIXA(S) - FAIXA(S) ABSOLUTO', '85 - KATA EQUIPE MASCULINO IDADE 15 A 59 ANOS FAIXA(S) - FAIXA(S) ABSOLUTO');
            $main_editor->addChoice('86 - KATA EQUIPE FEMININO IDADE 15 A 59 ANOS FAIXA(S) - FAIXA(S) ABSOLUTO', '86 - KATA EQUIPE FEMININO IDADE 15 A 59 ANOS FAIXA(S) - FAIXA(S) ABSOLUTO');
            $main_editor->SetAllowNullValue(false);
            
            $multi_value_select_editor = new MultiValueSelect('Categoria');
            $multi_value_select_editor->setChoices($main_editor->getChoices());
            
            $text_editor = new TextEdit('Categoria');
            
            $filterBuilder->addColumn(
                $columns['Categoria'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $text_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $text_editor,
                    FilterConditionOperator::BEGINS_WITH => $text_editor,
                    FilterConditionOperator::ENDS_WITH => $text_editor,
                    FilterConditionOperator::IS_LIKE => $text_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $text_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new ComboBox('nome_central_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $main_editor->addChoice('Shihan Cesar Maximiano', 'Shihan Cesar Maximiano');
            $main_editor->addChoice('Shihan Alexandre Prates', 'Shihan Alexandre Prates');
            $main_editor->addChoice('Sensei Andre Bacci', 'Sensei Andre Bacci');
            $main_editor->SetAllowNullValue(false);
            
            $multi_value_select_editor = new MultiValueSelect('Nome Central');
            $multi_value_select_editor->setChoices($main_editor->getChoices());
            
            $text_editor = new TextEdit('Nome Central');
            
            $filterBuilder->addColumn(
                $columns['Nome Central'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $text_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $text_editor,
                    FilterConditionOperator::BEGINS_WITH => $text_editor,
                    FilterConditionOperator::ENDS_WITH => $text_editor,
                    FilterConditionOperator::IS_LIKE => $text_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $text_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new ComboBox('nota_central_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $main_editor->addChoice('5,0', '5,0');
            $main_editor->addChoice('5,1', '5,1');
            $main_editor->addChoice('5,2', '5,2');
            $main_editor->addChoice('5,3', '5,3');
            $main_editor->addChoice('5,4', '5,4');
            $main_editor->addChoice('5,5', '5,5');
            $main_editor->addChoice('5,6', '5,6');
            $main_editor->addChoice('5,7', '5,7');
            $main_editor->addChoice('5,8', '5,8');
            $main_editor->addChoice('5,9', '5,9');
            $main_editor->addChoice('6,0', '6,0');
            $main_editor->addChoice('6,1', '6,1');
            $main_editor->addChoice('6,2', '6,2');
            $main_editor->addChoice('6,3', '6,3');
            $main_editor->addChoice('6,4', '6,4');
            $main_editor->addChoice('6,5', '6,5');
            $main_editor->addChoice('6,6', '6,6');
            $main_editor->addChoice('6,7', '6,7');
            $main_editor->addChoice('6,8', '6,8');
            $main_editor->addChoice('6,9', '6,9');
            $main_editor->addChoice('7,0', '7,0');
            $main_editor->SetAllowNullValue(false);
            
            $multi_value_select_editor = new MultiValueSelect('Nota Central');
            $multi_value_select_editor->setChoices($main_editor->getChoices());
            
            $text_editor = new TextEdit('Nota Central');
            
            $filterBuilder->addColumn(
                $columns['Nota Central'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $text_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $text_editor,
                    FilterConditionOperator::BEGINS_WITH => $text_editor,
                    FilterConditionOperator::ENDS_WITH => $text_editor,
                    FilterConditionOperator::IS_LIKE => $text_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $text_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new ComboBox('nome_lateral_1_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $main_editor->addChoice('Shihan Paulo Misumi', 'Shihan Paulo Misumi');
            $main_editor->addChoice('Sensei Gilberto ConceiÃ§Ã£o', 'Sensei Gilberto ConceiÃ§Ã£o');
            $main_editor->addChoice('Senpai Rodrigo Silva', 'Senpai Rodrigo Silva');
            $main_editor->addChoice('Sensei Oziel Alexandre', 'Sensei Oziel Alexandre');
            $main_editor->addChoice('Sensei Anderson Moraes', 'Sensei Anderson Moraes');
            $main_editor->addChoice('Sensei Murilo Hortolan', 'Sensei Murilo Hortolan');
            $main_editor->addChoice('Sensei Fernando Roller', 'Sensei Fernando Roller');
            $main_editor->addChoice('Sensei Thais Carolina', 'Sensei Thais Carolina');
            $main_editor->addChoice('Sensei Cristiano Silva', 'Sensei Cristiano Silva');
            $main_editor->addChoice('Sensei Jose Ribeiro', 'Sensei Jose Ribeiro');
            $main_editor->addChoice('Sensei Rogerio Baltazar', 'Sensei Rogerio Baltazar');
            $main_editor->addChoice('Sensei JoÃ£o Paulo Portugal', 'Sensei JoÃ£o Paulo Portugal');
            $main_editor->addChoice('Sensei Bianca Pereira', 'Sensei Bianca Pereira');
            $main_editor->addChoice('Senpai Carla', 'Senpai Carla');
            $main_editor->SetAllowNullValue(false);
            
            $multi_value_select_editor = new MultiValueSelect('Nome Lateral 1');
            $multi_value_select_editor->setChoices($main_editor->getChoices());
            
            $text_editor = new TextEdit('Nome Lateral 1');
            
            $filterBuilder->addColumn(
                $columns['Nome Lateral 1'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $text_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $text_editor,
                    FilterConditionOperator::BEGINS_WITH => $text_editor,
                    FilterConditionOperator::ENDS_WITH => $text_editor,
                    FilterConditionOperator::IS_LIKE => $text_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $text_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new ComboBox('nota_lateral_1_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $main_editor->addChoice('5,0', '5,0');
            $main_editor->addChoice('5,1', '5,1');
            $main_editor->addChoice('5,2', '5,2');
            $main_editor->addChoice('5,3', '5,3');
            $main_editor->addChoice('5,4', '5,4');
            $main_editor->addChoice('5,5', '5,5');
            $main_editor->addChoice('5,6', '5,6');
            $main_editor->addChoice('5,7', '5,7');
            $main_editor->addChoice('5,8', '5,8');
            $main_editor->addChoice('5,9', '5,9');
            $main_editor->addChoice('6,0', '6,0');
            $main_editor->addChoice('6,1', '6,1');
            $main_editor->addChoice('6,2', '6,2');
            $main_editor->addChoice('6,3', '6,3');
            $main_editor->addChoice('6,4', '6,4');
            $main_editor->addChoice('6,5', '6,5');
            $main_editor->addChoice('6,6', '6,6');
            $main_editor->addChoice('6,7', '6,7');
            $main_editor->addChoice('6,8', '6,8');
            $main_editor->addChoice('6,9', '6,9');
            $main_editor->addChoice('7,0', '7,0');
            $main_editor->SetAllowNullValue(false);
            
            $multi_value_select_editor = new MultiValueSelect('Nota Lateral 1');
            $multi_value_select_editor->setChoices($main_editor->getChoices());
            
            $text_editor = new TextEdit('Nota Lateral 1');
            
            $filterBuilder->addColumn(
                $columns['Nota Lateral 1'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $text_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $text_editor,
                    FilterConditionOperator::BEGINS_WITH => $text_editor,
                    FilterConditionOperator::ENDS_WITH => $text_editor,
                    FilterConditionOperator::IS_LIKE => $text_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $text_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new ComboBox('nome_lateral_2_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $main_editor->addChoice('Shihan Paulo Misumi', 'Shihan Paulo Misumi');
            $main_editor->addChoice('Sensei Gilberto ConceiÃ§Ã£o', 'Sensei Gilberto ConceiÃ§Ã£o');
            $main_editor->addChoice('Senpai Rodrigo Silva', 'Senpai Rodrigo Silva');
            $main_editor->addChoice('Sensei Oziel Alexandre', 'Sensei Oziel Alexandre');
            $main_editor->addChoice('Sensei Anderson Moraes', 'Sensei Anderson Moraes');
            $main_editor->addChoice('Sensei Murilo Hortolan', 'Sensei Murilo Hortolan');
            $main_editor->addChoice('Sensei Fernando Roller', 'Sensei Fernando Roller');
            $main_editor->addChoice('Sensei Thais Carolina', 'Sensei Thais Carolina');
            $main_editor->addChoice('Sensei Cristiano Silva', 'Sensei Cristiano Silva');
            $main_editor->addChoice('Sensei Jose Ribeiro', 'Sensei Jose Ribeiro');
            $main_editor->addChoice('Sensei Rogerio Baltazar', 'Sensei Rogerio Baltazar');
            $main_editor->addChoice('Sensei JoÃ£o Paulo Portugal', 'Sensei JoÃ£o Paulo Portugal');
            $main_editor->addChoice('Sensei Bianca Pereira', 'Sensei Bianca Pereira');
            $main_editor->addChoice('Senpai Carla', 'Senpai Carla');
            $main_editor->SetAllowNullValue(false);
            
            $multi_value_select_editor = new MultiValueSelect('Nome Lateral 2');
            $multi_value_select_editor->setChoices($main_editor->getChoices());
            
            $text_editor = new TextEdit('Nome Lateral 2');
            
            $filterBuilder->addColumn(
                $columns['Nome Lateral 2'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $text_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $text_editor,
                    FilterConditionOperator::BEGINS_WITH => $text_editor,
                    FilterConditionOperator::ENDS_WITH => $text_editor,
                    FilterConditionOperator::IS_LIKE => $text_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $text_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new ComboBox('nota_lateral_2_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $main_editor->addChoice('5,0', '5,0');
            $main_editor->addChoice('5,1', '5,1');
            $main_editor->addChoice('5,2', '5,2');
            $main_editor->addChoice('5,3', '5,3');
            $main_editor->addChoice('5,4', '5,4');
            $main_editor->addChoice('5,5', '5,5');
            $main_editor->addChoice('5,6', '5,6');
            $main_editor->addChoice('5,7', '5,7');
            $main_editor->addChoice('5,8', '5,8');
            $main_editor->addChoice('5,9', '5,9');
            $main_editor->addChoice('6,0', '6,0');
            $main_editor->addChoice('6,1', '6,1');
            $main_editor->addChoice('6,2', '6,2');
            $main_editor->addChoice('6,3', '6,3');
            $main_editor->addChoice('6,4', '6,4');
            $main_editor->addChoice('6,5', '6,5');
            $main_editor->addChoice('6,6', '6,6');
            $main_editor->addChoice('6,7', '6,7');
            $main_editor->addChoice('6,8', '6,8');
            $main_editor->addChoice('6,9', '6,9');
            $main_editor->addChoice('7,0', '7,0');
            $main_editor->SetAllowNullValue(false);
            
            $multi_value_select_editor = new MultiValueSelect('Nota Lateral 2');
            $multi_value_select_editor->setChoices($main_editor->getChoices());
            
            $text_editor = new TextEdit('Nota Lateral 2');
            
            $filterBuilder->addColumn(
                $columns['Nota Lateral 2'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $text_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $text_editor,
                    FilterConditionOperator::BEGINS_WITH => $text_editor,
                    FilterConditionOperator::ENDS_WITH => $text_editor,
                    FilterConditionOperator::IS_LIKE => $text_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $text_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new ComboBox('nome_lateral_3_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $main_editor->addChoice('Shihan Paulo Misumi', 'Shihan Paulo Misumi');
            $main_editor->addChoice('Sensei Gilberto ConceiÃ§Ã£o', 'Sensei Gilberto ConceiÃ§Ã£o');
            $main_editor->addChoice('Senpai Rodrigo Silva', 'Senpai Rodrigo Silva');
            $main_editor->addChoice('Sensei Oziel Alexandre', 'Sensei Oziel Alexandre');
            $main_editor->addChoice('Sensei Anderson Moraes', 'Sensei Anderson Moraes');
            $main_editor->addChoice('Sensei Murilo Hortolan', 'Sensei Murilo Hortolan');
            $main_editor->addChoice('Sensei Fernando Roller', 'Sensei Fernando Roller');
            $main_editor->addChoice('Sensei Thais Carolina', 'Sensei Thais Carolina');
            $main_editor->addChoice('Sensei Cristiano Silva', 'Sensei Cristiano Silva');
            $main_editor->addChoice('Sensei Jose Ribeiro', 'Sensei Jose Ribeiro');
            $main_editor->addChoice('Sensei Rogerio Baltazar', 'Sensei Rogerio Baltazar');
            $main_editor->addChoice('Sensei JoÃ£o Paulo Portugal', 'Sensei JoÃ£o Paulo Portugal');
            $main_editor->addChoice('Sensei Bianca Pereira', 'Sensei Bianca Pereira');
            $main_editor->addChoice('Senpai Carla', 'Senpai Carla');
            $main_editor->SetAllowNullValue(false);
            
            $multi_value_select_editor = new MultiValueSelect('Nome Lateral 3');
            $multi_value_select_editor->setChoices($main_editor->getChoices());
            
            $text_editor = new TextEdit('Nome Lateral 3');
            
            $filterBuilder->addColumn(
                $columns['Nome Lateral 3'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $text_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $text_editor,
                    FilterConditionOperator::BEGINS_WITH => $text_editor,
                    FilterConditionOperator::ENDS_WITH => $text_editor,
                    FilterConditionOperator::IS_LIKE => $text_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $text_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new ComboBox('nota_lateral_3_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $main_editor->addChoice('5,0', '5,0');
            $main_editor->addChoice('5,1', '5,1');
            $main_editor->addChoice('5,2', '5,2');
            $main_editor->addChoice('5,3', '5,3');
            $main_editor->addChoice('5,4', '5,4');
            $main_editor->addChoice('5,5', '5,5');
            $main_editor->addChoice('5,6', '5,6');
            $main_editor->addChoice('5,7', '5,7');
            $main_editor->addChoice('5,8', '5,8');
            $main_editor->addChoice('5,9', '5,9');
            $main_editor->addChoice('6,0', '6,0');
            $main_editor->addChoice('6,1', '6,1');
            $main_editor->addChoice('6,2', '6,2');
            $main_editor->addChoice('6,3', '6,3');
            $main_editor->addChoice('6,4', '6,4');
            $main_editor->addChoice('6,5', '6,5');
            $main_editor->addChoice('6,6', '6,6');
            $main_editor->addChoice('6,7', '6,7');
            $main_editor->addChoice('6,8', '6,8');
            $main_editor->addChoice('6,9', '6,9');
            $main_editor->addChoice('7,0', '7,0');
            $main_editor->SetAllowNullValue(false);
            
            $multi_value_select_editor = new MultiValueSelect('Nota Lateral 3');
            $multi_value_select_editor->setChoices($main_editor->getChoices());
            
            $text_editor = new TextEdit('Nota Lateral 3');
            
            $filterBuilder->addColumn(
                $columns['Nota Lateral 3'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $text_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $text_editor,
                    FilterConditionOperator::BEGINS_WITH => $text_editor,
                    FilterConditionOperator::ENDS_WITH => $text_editor,
                    FilterConditionOperator::IS_LIKE => $text_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $text_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new ComboBox('nome_lateral_4_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $main_editor->addChoice('Shihan Paulo Misumi', 'Shihan Paulo Misumi');
            $main_editor->addChoice('Sensei Gilberto ConceiÃ§Ã£o', 'Sensei Gilberto ConceiÃ§Ã£o');
            $main_editor->addChoice('Senpai Rodrigo Silva', 'Senpai Rodrigo Silva');
            $main_editor->addChoice('Sensei Oziel Alexandre', 'Sensei Oziel Alexandre');
            $main_editor->addChoice('Sensei Anderson Moraes', 'Sensei Anderson Moraes');
            $main_editor->addChoice('Sensei Murilo Hortolan', 'Sensei Murilo Hortolan');
            $main_editor->addChoice('Sensei Fernando Roller', 'Sensei Fernando Roller');
            $main_editor->addChoice('Sensei Thais Carolina', 'Sensei Thais Carolina');
            $main_editor->addChoice('Sensei Cristiano Silva', 'Sensei Cristiano Silva');
            $main_editor->addChoice('Sensei Jose Ribeiro', 'Sensei Jose Ribeiro');
            $main_editor->addChoice('Sensei Rogerio Baltazar', 'Sensei Rogerio Baltazar');
            $main_editor->addChoice('Sensei JoÃ£o Paulo Portugal', 'Sensei JoÃ£o Paulo Portugal');
            $main_editor->addChoice('Sensei Bianca Pereira', 'Sensei Bianca Pereira');
            $main_editor->addChoice('Senpai Carla', 'Senpai Carla');
            $main_editor->SetAllowNullValue(false);
            
            $multi_value_select_editor = new MultiValueSelect('Nome Lateral 4');
            $multi_value_select_editor->setChoices($main_editor->getChoices());
            
            $text_editor = new TextEdit('Nome Lateral 4');
            
            $filterBuilder->addColumn(
                $columns['Nome Lateral 4'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $text_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $text_editor,
                    FilterConditionOperator::BEGINS_WITH => $text_editor,
                    FilterConditionOperator::ENDS_WITH => $text_editor,
                    FilterConditionOperator::IS_LIKE => $text_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $text_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new ComboBox('nota_lateral_4_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $main_editor->addChoice('5,0', '5,0');
            $main_editor->addChoice('5,1', '5,1');
            $main_editor->addChoice('5,2', '5,2');
            $main_editor->addChoice('5,3', '5,3');
            $main_editor->addChoice('5,4', '5,4');
            $main_editor->addChoice('5,5', '5,5');
            $main_editor->addChoice('5,6', '5,6');
            $main_editor->addChoice('5,7', '5,7');
            $main_editor->addChoice('5,8', '5,8');
            $main_editor->addChoice('5,9', '5,9');
            $main_editor->addChoice('6,0', '6,0');
            $main_editor->addChoice('6,1', '6,1');
            $main_editor->addChoice('6,2', '6,2');
            $main_editor->addChoice('6,3', '6,3');
            $main_editor->addChoice('6,4', '6,4');
            $main_editor->addChoice('6,5', '6,5');
            $main_editor->addChoice('6,6', '6,6');
            $main_editor->addChoice('6,7', '6,7');
            $main_editor->addChoice('6,8', '6,8');
            $main_editor->addChoice('6,9', '6,9');
            $main_editor->addChoice('7,0', '7,0');
            $main_editor->SetAllowNullValue(false);
            
            $multi_value_select_editor = new MultiValueSelect('Nota Lateral 4');
            $multi_value_select_editor->setChoices($main_editor->getChoices());
            
            $text_editor = new TextEdit('Nota Lateral 4');
            
            $filterBuilder->addColumn(
                $columns['Nota Lateral 4'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $text_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $text_editor,
                    FilterConditionOperator::BEGINS_WITH => $text_editor,
                    FilterConditionOperator::ENDS_WITH => $text_editor,
                    FilterConditionOperator::IS_LIKE => $text_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $text_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
        }
    
        protected function AddOperationsColumns(Grid $grid)
        {
            $actions = $grid->getActions();
            $actions->setCaption($this->GetLocalizerCaptions()->GetMessageString('Actions'));
            $actions->setPosition(ActionList::POSITION_LEFT);
            
            if ($this->GetSecurityInfo()->HasViewGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('View'), OPERATION_VIEW, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
            
            if ($this->GetSecurityInfo()->HasEditGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Edit'), OPERATION_EDIT, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowEditButtonHandler', $this);
            }
            
            if ($this->GetSecurityInfo()->HasDeleteGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Delete'), OPERATION_DELETE, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowDeleteButtonHandler', $this);
                $operation->SetAdditionalAttribute('data-modal-operation', 'delete');
                $operation->SetAdditionalAttribute('data-delete-handler-name', $this->GetModalGridDeleteHandler());
            }
            
            if ($this->GetSecurityInfo()->HasAddGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Copy'), OPERATION_COPY, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
        }
    
        protected function AddFieldColumns(Grid $grid, $withDetails = true)
        {
            //
            // View column for Categoria field
            //
            $column = new TextViewColumn('Categoria', 'Categoria', 'Categoria', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Nome Central field
            //
            $column = new TextViewColumn('Nome Central', 'Nome Central', 'Central', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Nota Central field
            //
            $column = new TextViewColumn('Nota Central', 'Nota Central', 'C_Nota', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Nome Lateral 1 field
            //
            $column = new TextViewColumn('Nome Lateral 1', 'Nome Lateral 1', 'Lateral 1', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Nota Lateral 1 field
            //
            $column = new TextViewColumn('Nota Lateral 1', 'Nota Lateral 1', 'L1_Nota', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Nome Lateral 2 field
            //
            $column = new TextViewColumn('Nome Lateral 2', 'Nome Lateral 2', 'Lateral 2', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Nota Lateral 2 field
            //
            $column = new TextViewColumn('Nota Lateral 2', 'Nota Lateral 2', 'L2_Nota', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Nome Lateral 3 field
            //
            $column = new TextViewColumn('Nome Lateral 3', 'Nome Lateral 3', 'Lateral 3', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Nota Lateral 3 field
            //
            $column = new TextViewColumn('Nota Lateral 3', 'Nota Lateral 3', 'L3_Nota', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Nome Lateral 4 field
            //
            $column = new TextViewColumn('Nome Lateral 4', 'Nome Lateral 4', 'Lateral 4', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Nota Lateral 4 field
            //
            $column = new TextViewColumn('Nota Lateral 4', 'Nota Lateral 4', 'L4_Nota', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for Categoria field
            //
            $column = new TextViewColumn('Categoria', 'Categoria', 'Categoria', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Nome Central field
            //
            $column = new TextViewColumn('Nome Central', 'Nome Central', 'Central', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Nota Central field
            //
            $column = new TextViewColumn('Nota Central', 'Nota Central', 'C_Nota', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Nome Lateral 1 field
            //
            $column = new TextViewColumn('Nome Lateral 1', 'Nome Lateral 1', 'Lateral 1', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Nota Lateral 1 field
            //
            $column = new TextViewColumn('Nota Lateral 1', 'Nota Lateral 1', 'L1_Nota', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Nome Lateral 2 field
            //
            $column = new TextViewColumn('Nome Lateral 2', 'Nome Lateral 2', 'Lateral 2', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Nota Lateral 2 field
            //
            $column = new TextViewColumn('Nota Lateral 2', 'Nota Lateral 2', 'L2_Nota', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Nome Lateral 3 field
            //
            $column = new TextViewColumn('Nome Lateral 3', 'Nome Lateral 3', 'Lateral 3', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Nota Lateral 3 field
            //
            $column = new TextViewColumn('Nota Lateral 3', 'Nota Lateral 3', 'L3_Nota', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Nome Lateral 4 field
            //
            $column = new TextViewColumn('Nome Lateral 4', 'Nome Lateral 4', 'Lateral 4', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Nota Lateral 4 field
            //
            $column = new TextViewColumn('Nota Lateral 4', 'Nota Lateral 4', 'L4_Nota', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for Categoria field
            //
            $editor = new ComboBox('categoria_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('01 - KATA INDIVIDUAL MASCULINO IDADE 5 A 8 ANOS FAIXA(S) BRANCA E LARANJA', '01 - KATA INDIVIDUAL MASCULINO IDADE 5 A 8 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('02 - KATA INDIVIDUAL MASCULINO IDADE 5 A 8 ANOS FAIXA(S) AZUL E AMARELA', '02 - KATA INDIVIDUAL MASCULINO IDADE 5 A 8 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('03 - KATA INDIVIDUAL MASCULINO IDADE 9 A 11 ANOS FAIXA(S) BRANCA E LARANJA', '03 - KATA INDIVIDUAL MASCULINO IDADE 9 A 11 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('04 - KATA INDIVIDUAL MASCULINO IDADE 9 A 11 ANOS FAIXA(S) AZUL E AMARELA', '04 - KATA INDIVIDUAL MASCULINO IDADE 9 A 11 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('05 - KATA INDIVIDUAL MASCULINO IDADE 9 A 11 ANOS FAIXA(S) VERDE E MARROM', '05 - KATA INDIVIDUAL MASCULINO IDADE 9 A 11 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('06 - KATA INDIVIDUAL MASCULINO IDADE 12 A 14 ANOS FAIXA(S) BRANCA E LARANJA', '06 - KATA INDIVIDUAL MASCULINO IDADE 12 A 14 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('07 - KATA INDIVIDUAL MASCULINO IDADE 12 A 14 ANOS FAIXA(S) AZUL E AMARELA', '07 - KATA INDIVIDUAL MASCULINO IDADE 12 A 14 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('08 - KATA INDIVIDUAL MASCULINO IDADE 12 A 14 ANOS FAIXA(S) VERDE E MARROM', '08 - KATA INDIVIDUAL MASCULINO IDADE 12 A 14 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('09 - KATA INDIVIDUAL MASCULINO IDADE 12 A 14 ANOS FAIXA(S) PRETA', '09 - KATA INDIVIDUAL MASCULINO IDADE 12 A 14 ANOS FAIXA(S) PRETA');
            $editor->addChoice('10 - KATA INDIVIDUAL MASCULINO IDADE 15 A 17 ANOS FAIXA(S) BRANCA E LARANJA', '10 - KATA INDIVIDUAL MASCULINO IDADE 15 A 17 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('11 - KATA INDIVIDUAL MASCULINO IDADE 15 A 17 ANOS FAIXA(S) AZUL E AMARELA', '11 - KATA INDIVIDUAL MASCULINO IDADE 15 A 17 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('12 - KATA INDIVIDUAL MASCULINO IDADE 15 A 17 ANOS FAIXA(S) VERDE E MARROM', '12 - KATA INDIVIDUAL MASCULINO IDADE 15 A 17 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('13 - KATA INDIVIDUAL MASCULINO IDADE 15 A 17 ANOS FAIXA(S) PRETA', '13 - KATA INDIVIDUAL MASCULINO IDADE 15 A 17 ANOS FAIXA(S) PRETA');
            $editor->addChoice('14 - KATA INDIVIDUAL MASCULINO IDADE 18 A 23 ANOS FAIXA(S) BRANCA E LARANJA', '14 - KATA INDIVIDUAL MASCULINO IDADE 18 A 23 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('15 - KATA INDIVIDUAL MASCULINO IDADE 18 A 23 ANOS FAIXA(S) AZUL E AMARELA', '15 - KATA INDIVIDUAL MASCULINO IDADE 18 A 23 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('16 - KATA INDIVIDUAL MASCULINO IDADE 18 A 23 ANOS FAIXA(S) VERDE E MARROM', '16 - KATA INDIVIDUAL MASCULINO IDADE 18 A 23 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('17 - KATA INDIVIDUAL MASCULINO IDADE 18 A 23 ANOS FAIXA(S) PRETA', '17 - KATA INDIVIDUAL MASCULINO IDADE 18 A 23 ANOS FAIXA(S) PRETA');
            $editor->addChoice('18 - KATA INDIVIDUAL MASCULINO IDADE 24 A 29 ANOS FAIXA(S) BRANCA E LARANJA', '18 - KATA INDIVIDUAL MASCULINO IDADE 24 A 29 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('19 - KATA INDIVIDUAL MASCULINO IDADE 24 A 29 ANOS FAIXA(S) AZUL E AMARELA', '19 - KATA INDIVIDUAL MASCULINO IDADE 24 A 29 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('20 - KATA INDIVIDUAL MASCULINO IDADE 24 A 29 ANOS FAIXA(S) VERDE E MARROM', '20 - KATA INDIVIDUAL MASCULINO IDADE 24 A 29 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('21 - KATA INDIVIDUAL MASCULINO IDADE 24 A 29 ANOS FAIXA(S) PRETA', '21 - KATA INDIVIDUAL MASCULINO IDADE 24 A 29 ANOS FAIXA(S) PRETA');
            $editor->addChoice('22 - KATA INDIVIDUAL MASCULINO IDADE 30 A 35 ANOS FAIXA(S) BRANCA E LARANJA', '22 - KATA INDIVIDUAL MASCULINO IDADE 30 A 35 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('23 - KATA INDIVIDUAL MASCULINO IDADE 30 A 35 ANOS FAIXA(S) AZUL E AMARELA', '23 - KATA INDIVIDUAL MASCULINO IDADE 30 A 35 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('24 - KATA INDIVIDUAL MASCULINO IDADE 30 A 35 ANOS FAIXA(S) VERDE E MARROM', '24 - KATA INDIVIDUAL MASCULINO IDADE 30 A 35 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('25 - KATA INDIVIDUAL MASCULINO IDADE 30 A 35 ANOS FAIXA(S) PRETA', '25 - KATA INDIVIDUAL MASCULINO IDADE 30 A 35 ANOS FAIXA(S) PRETA');
            $editor->addChoice('26 - KATA INDIVIDUAL MASCULINO IDADE 36 A 43 ANOS FAIXA(S) BRANCA E LARANJA', '26 - KATA INDIVIDUAL MASCULINO IDADE 36 A 43 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('27 - KATA INDIVIDUAL MASCULINO IDADE 36 A 43 ANOS FAIXA(S) AZUL E AMARELA', '27 - KATA INDIVIDUAL MASCULINO IDADE 36 A 43 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('28 - KATA INDIVIDUAL MASCULINO IDADE 36 A 43 ANOS FAIXA(S) VERDE E MARROM', '28 - KATA INDIVIDUAL MASCULINO IDADE 36 A 43 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('29 - KATA INDIVIDUAL MASCULINO IDADE 36 A 43 ANOS FAIXA(S) PRETA', '29 - KATA INDIVIDUAL MASCULINO IDADE 36 A 43 ANOS FAIXA(S) PRETA');
            $editor->addChoice('30 - KATA INDIVIDUAL MASCULINO IDADE 44 A 52 ANOS FAIXA(S) BRANCA E LARANJA', '30 - KATA INDIVIDUAL MASCULINO IDADE 44 A 52 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('31 - KATA INDIVIDUAL MASCULINO IDADE 44 A 52 ANOS FAIXA(S) AZUL E AMARELA', '31 - KATA INDIVIDUAL MASCULINO IDADE 44 A 52 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('32 - KATA INDIVIDUAL MASCULINO IDADE 44 A 52 ANOS FAIXA(S) VERDE E MARROM', '32 - KATA INDIVIDUAL MASCULINO IDADE 44 A 52 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('33 - KATA INDIVIDUAL MASCULINO IDADE 44 A 52 ANOS FAIXA(S) PRETA', '33 - KATA INDIVIDUAL MASCULINO IDADE 44 A 52 ANOS FAIXA(S) PRETA');
            $editor->addChoice('34 - KATA INDIVIDUAL MASCULINO IDADE 53 A 59 ANOS FAIXA(S) BRANCA E LARANJA', '34 - KATA INDIVIDUAL MASCULINO IDADE 53 A 59 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('35 - KATA INDIVIDUAL MASCULINO IDADE 53 A 59 ANOS FAIXA(S) AZUL E AMARELA', '35 - KATA INDIVIDUAL MASCULINO IDADE 53 A 59 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('36 - KATA INDIVIDUAL MASCULINO IDADE 53 A 59 ANOS FAIXA(S) VERDE E MARROM', '36 - KATA INDIVIDUAL MASCULINO IDADE 53 A 59 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('37 - KATA INDIVIDUAL MASCULINO IDADE 53 A 59 ANOS FAIXA(S) PRETA', '37 - KATA INDIVIDUAL MASCULINO IDADE 53 A 59 ANOS FAIXA(S) PRETA');
            $editor->addChoice('38 - KATA INDIVIDUAL FEMININO IDADE 5 A 8 ANOS FAIXA(S) BRANCA E LARANJA', '38 - KATA INDIVIDUAL FEMININO IDADE 5 A 8 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('39 - KATA INDIVIDUAL FEMININO IDADE 5 A 8 ANOS FAIXA(S) AZUL E AMARELA', '39 - KATA INDIVIDUAL FEMININO IDADE 5 A 8 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('40 - KATA INDIVIDUAL FEMININO IDADE 9 A 11 ANOS FAIXA(S) BRANCA E LARANJA', '40 - KATA INDIVIDUAL FEMININO IDADE 9 A 11 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('41 - KATA INDIVIDUAL FEMININO IDADE 9 A 11 ANOS FAIXA(S) AZUL E AMARELA', '41 - KATA INDIVIDUAL FEMININO IDADE 9 A 11 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('42 - KATA INDIVIDUAL FEMININO IDADE 9 A 11 ANOS FAIXA(S) VERDE E MARROM', '42 - KATA INDIVIDUAL FEMININO IDADE 9 A 11 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('43 - KATA INDIVIDUAL FEMININO IDADE 12 A 14 ANOS FAIXA(S) BRANCA E LARANJA', '43 - KATA INDIVIDUAL FEMININO IDADE 12 A 14 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('44 - KATA INDIVIDUAL FEMININO IDADE 12 A 14 ANOS FAIXA(S) AZUL E AMARELA', '44 - KATA INDIVIDUAL FEMININO IDADE 12 A 14 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('45 - KATA INDIVIDUAL FEMININO IDADE 12 A 14 ANOS FAIXA(S) VERDE E MARROM', '45 - KATA INDIVIDUAL FEMININO IDADE 12 A 14 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('46 - KATA INDIVIDUAL FEMININO IDADE 12 A 14 ANOS FAIXA(S) PRETA', '46 - KATA INDIVIDUAL FEMININO IDADE 12 A 14 ANOS FAIXA(S) PRETA');
            $editor->addChoice('47 - KATA INDIVIDUAL FEMININO IDADE 15 A 17 ANOS FAIXA(S) BRANCA E LARANJA', '47 - KATA INDIVIDUAL FEMININO IDADE 15 A 17 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('48 - KATA INDIVIDUAL FEMININO IDADE 15 A 17 ANOS FAIXA(S) AZUL E AMARELA', '48 - KATA INDIVIDUAL FEMININO IDADE 15 A 17 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('49 - KATA INDIVIDUAL FEMININO IDADE 15 A 17 ANOS FAIXA(S) VERDE E MARROM', '49 - KATA INDIVIDUAL FEMININO IDADE 15 A 17 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('50 - KATA INDIVIDUAL FEMININO IDADE 15 A 17 ANOS FAIXA(S) PRETA', '50 - KATA INDIVIDUAL FEMININO IDADE 15 A 17 ANOS FAIXA(S) PRETA');
            $editor->addChoice('51 - KATA INDIVIDUAL FEMININO IDADE 18 A 23 ANOS FAIXA(S) BRANCA E LARANJA', '51 - KATA INDIVIDUAL FEMININO IDADE 18 A 23 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('52 - KATA INDIVIDUAL FEMININO IDADE 18 A 23 ANOS FAIXA(S) AZUL E AMARELA', '52 - KATA INDIVIDUAL FEMININO IDADE 18 A 23 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('53 - KATA INDIVIDUAL FEMININO IDADE 18 A 23 ANOS FAIXA(S) VERDE E MARROM', '53 - KATA INDIVIDUAL FEMININO IDADE 18 A 23 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('54 - KATA INDIVIDUAL FEMININO IDADE 18 A 23 ANOS FAIXA(S) PRETA', '54 - KATA INDIVIDUAL FEMININO IDADE 18 A 23 ANOS FAIXA(S) PRETA');
            $editor->addChoice('55 - KATA INDIVIDUAL FEMININO IDADE 24 A 29 ANOS FAIXA(S) BRANCA E LARANJA', '55 - KATA INDIVIDUAL FEMININO IDADE 24 A 29 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('56 - KATA INDIVIDUAL FEMININO IDADE 24 A 29 ANOS FAIXA(S) AZUL E AMARELA', '56 - KATA INDIVIDUAL FEMININO IDADE 24 A 29 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('57 - KATA INDIVIDUAL FEMININO IDADE 24 A 29 ANOS FAIXA(S) VERDE E MARROM', '57 - KATA INDIVIDUAL FEMININO IDADE 24 A 29 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('58 - KATA INDIVIDUAL FEMININO IDADE 24 A 29 ANOS FAIXA(S) PRETA', '58 - KATA INDIVIDUAL FEMININO IDADE 24 A 29 ANOS FAIXA(S) PRETA');
            $editor->addChoice('59 - KATA INDIVIDUAL FEMININO IDADE 30 A 35 ANOS FAIXA(S) BRANCA E LARANJA', '59 - KATA INDIVIDUAL FEMININO IDADE 30 A 35 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('60 - KATA INDIVIDUAL FEMININO IDADE 30 A 35 ANOS FAIXA(S) AZUL E AMARELA', '60 - KATA INDIVIDUAL FEMININO IDADE 30 A 35 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('61 - KATA INDIVIDUAL FEMININO IDADE 30 A 35 ANOS FAIXA(S) VERDE E MARROM', '61 - KATA INDIVIDUAL FEMININO IDADE 30 A 35 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('62 - KATA INDIVIDUAL FEMININO IDADE 30 A 35 ANOS FAIXA(S) PRETA', '62 - KATA INDIVIDUAL FEMININO IDADE 30 A 35 ANOS FAIXA(S) PRETA');
            $editor->addChoice('63 - KATA INDIVIDUAL FEMININO IDADE 36 A 43 ANOS FAIXA(S) BRANCA E LARANJA', '63 - KATA INDIVIDUAL FEMININO IDADE 36 A 43 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('64 - KATA INDIVIDUAL FEMININO IDADE 36 A 43 ANOS FAIXA(S) AZUL E AMARELA', '64 - KATA INDIVIDUAL FEMININO IDADE 36 A 43 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('65 - KATA INDIVIDUAL FEMININO IDADE 36 A 43 ANOS FAIXA(S) VERDE E MARROM', '65 - KATA INDIVIDUAL FEMININO IDADE 36 A 43 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('66 - KATA INDIVIDUAL FEMININO IDADE 36 A 43 ANOS FAIXA(S) PRETA', '66 - KATA INDIVIDUAL FEMININO IDADE 36 A 43 ANOS FAIXA(S) PRETA');
            $editor->addChoice('67 - KATA INDIVIDUAL FEMININO IDADE 44 A 52 ANOS FAIXA(S) BRANCA E LARANJA', '67 - KATA INDIVIDUAL FEMININO IDADE 44 A 52 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('68 - KATA INDIVIDUAL FEMININO IDADE 44 A 52 ANOS FAIXA(S) AZUL E AMARELA', '68 - KATA INDIVIDUAL FEMININO IDADE 44 A 52 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('69 - KATA INDIVIDUAL FEMININO IDADE 44 A 52 ANOS FAIXA(S) VERDE E MARROM', '69 - KATA INDIVIDUAL FEMININO IDADE 44 A 52 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('70 - KATA INDIVIDUAL FEMININO IDADE 44 A 52 ANOS FAIXA(S) PRETA', '70 - KATA INDIVIDUAL FEMININO IDADE 44 A 52 ANOS FAIXA(S) PRETA');
            $editor->addChoice('71 - KATA INDIVIDUAL FEMININO IDADE 53 A 59 ANOS FAIXA(S) BRANCA E LARANJA', '71 - KATA INDIVIDUAL FEMININO IDADE 53 A 59 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('72 - KATA INDIVIDUAL FEMININO IDADE 53 A 59 ANOS FAIXA(S) AZUL E AMARELA', '72 - KATA INDIVIDUAL FEMININO IDADE 53 A 59 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('73 - KATA INDIVIDUAL FEMININO IDADE 53 A 59 ANOS FAIXA(S) VERDE E MARROM', '73 - KATA INDIVIDUAL FEMININO IDADE 53 A 59 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('74 - KATA INDIVIDUAL FEMININO IDADE 53 A 59 ANOS FAIXA(S) PRETA', '74 - KATA INDIVIDUAL FEMININO IDADE 53 A 59 ANOS FAIXA(S) PRETA');
            $editor->addChoice('75 - KATA INDIVIDUAL MISTO IDADE 5 A 8 ANOS FAIXA(S) ABSOLUTO', '75 - KATA INDIVIDUAL MISTO IDADE 5 A 8 ANOS FAIXA(S) ABSOLUTO');
            $editor->addChoice('76 - KATA INDIVIDUAL MISTO IDADE 9 A 11 ANOS FAIXA(S) ABSOLUTO', '76 - KATA INDIVIDUAL MISTO IDADE 9 A 11 ANOS FAIXA(S) ABSOLUTO');
            $editor->addChoice('78 - KATA INDIVIDUAL MISTO IDADE 12 A 14 ANOS FAIXA(S) ABSOLUTO', '78 - KATA INDIVIDUAL MISTO IDADE 12 A 14 ANOS FAIXA(S) ABSOLUTO');
            $editor->addChoice('80 - KATA INDIVIDUAL MISTO IDADE 15 A 17 ANOS FAIXA(S) ABSOLUTO', '80 - KATA INDIVIDUAL MISTO IDADE 15 A 17 ANOS FAIXA(S) ABSOLUTO');
            $editor->addChoice('81 - KATA INDIVIDUAL MISTO IDADE 18 A 59 ANOS FAIXA(S) ABSOLUTO', '81 - KATA INDIVIDUAL MISTO IDADE 18 A 59 ANOS FAIXA(S) ABSOLUTO');
            $editor->addChoice('83 - KATA EQUIPE MASCULINO IDADE 5 A 14 ANOS FAIXA(S) - FAIXA(S) ABSOLUTO', '83 - KATA EQUIPE MASCULINO IDADE 5 A 14 ANOS FAIXA(S) - FAIXA(S) ABSOLUTO');
            $editor->addChoice('84 - KATA EQUIPE FEMININO IDADE 5 A 14 ANOS FAIXA(S) - FAIXA(S) ABSOLUTO', '84 - KATA EQUIPE FEMININO IDADE 5 A 14 ANOS FAIXA(S) - FAIXA(S) ABSOLUTO');
            $editor->addChoice('85 - KATA EQUIPE MASCULINO IDADE 15 A 59 ANOS FAIXA(S) - FAIXA(S) ABSOLUTO', '85 - KATA EQUIPE MASCULINO IDADE 15 A 59 ANOS FAIXA(S) - FAIXA(S) ABSOLUTO');
            $editor->addChoice('86 - KATA EQUIPE FEMININO IDADE 15 A 59 ANOS FAIXA(S) - FAIXA(S) ABSOLUTO', '86 - KATA EQUIPE FEMININO IDADE 15 A 59 ANOS FAIXA(S) - FAIXA(S) ABSOLUTO');
            $editColumn = new CustomEditColumn('Categoria', 'Categoria', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Nome Central field
            //
            $editor = new ComboBox('nome_central_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Shihan Cesar Maximiano', 'Shihan Cesar Maximiano');
            $editor->addChoice('Shihan Alexandre Prates', 'Shihan Alexandre Prates');
            $editor->addChoice('Sensei Andre Bacci', 'Sensei Andre Bacci');
            $editColumn = new CustomEditColumn('Central', 'Nome Central', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Nota Central field
            //
            $editor = new ComboBox('nota_central_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('5,0', '5,0');
            $editor->addChoice('5,1', '5,1');
            $editor->addChoice('5,2', '5,2');
            $editor->addChoice('5,3', '5,3');
            $editor->addChoice('5,4', '5,4');
            $editor->addChoice('5,5', '5,5');
            $editor->addChoice('5,6', '5,6');
            $editor->addChoice('5,7', '5,7');
            $editor->addChoice('5,8', '5,8');
            $editor->addChoice('5,9', '5,9');
            $editor->addChoice('6,0', '6,0');
            $editor->addChoice('6,1', '6,1');
            $editor->addChoice('6,2', '6,2');
            $editor->addChoice('6,3', '6,3');
            $editor->addChoice('6,4', '6,4');
            $editor->addChoice('6,5', '6,5');
            $editor->addChoice('6,6', '6,6');
            $editor->addChoice('6,7', '6,7');
            $editor->addChoice('6,8', '6,8');
            $editor->addChoice('6,9', '6,9');
            $editor->addChoice('7,0', '7,0');
            $editColumn = new CustomEditColumn('C_Nota', 'Nota Central', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Nome Lateral 1 field
            //
            $editor = new ComboBox('nome_lateral_1_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Shihan Paulo Misumi', 'Shihan Paulo Misumi');
            $editor->addChoice('Sensei Gilberto ConceiÃ§Ã£o', 'Sensei Gilberto ConceiÃ§Ã£o');
            $editor->addChoice('Senpai Rodrigo Silva', 'Senpai Rodrigo Silva');
            $editor->addChoice('Sensei Oziel Alexandre', 'Sensei Oziel Alexandre');
            $editor->addChoice('Sensei Anderson Moraes', 'Sensei Anderson Moraes');
            $editor->addChoice('Sensei Murilo Hortolan', 'Sensei Murilo Hortolan');
            $editor->addChoice('Sensei Fernando Roller', 'Sensei Fernando Roller');
            $editor->addChoice('Sensei Thais Carolina', 'Sensei Thais Carolina');
            $editor->addChoice('Sensei Cristiano Silva', 'Sensei Cristiano Silva');
            $editor->addChoice('Sensei Jose Ribeiro', 'Sensei Jose Ribeiro');
            $editor->addChoice('Sensei Rogerio Baltazar', 'Sensei Rogerio Baltazar');
            $editor->addChoice('Sensei JoÃ£o Paulo Portugal', 'Sensei JoÃ£o Paulo Portugal');
            $editor->addChoice('Sensei Bianca Pereira', 'Sensei Bianca Pereira');
            $editor->addChoice('Senpai Carla', 'Senpai Carla');
            $editColumn = new CustomEditColumn('Lateral 1', 'Nome Lateral 1', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Nota Lateral 1 field
            //
            $editor = new ComboBox('nota_lateral_1_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('5,0', '5,0');
            $editor->addChoice('5,1', '5,1');
            $editor->addChoice('5,2', '5,2');
            $editor->addChoice('5,3', '5,3');
            $editor->addChoice('5,4', '5,4');
            $editor->addChoice('5,5', '5,5');
            $editor->addChoice('5,6', '5,6');
            $editor->addChoice('5,7', '5,7');
            $editor->addChoice('5,8', '5,8');
            $editor->addChoice('5,9', '5,9');
            $editor->addChoice('6,0', '6,0');
            $editor->addChoice('6,1', '6,1');
            $editor->addChoice('6,2', '6,2');
            $editor->addChoice('6,3', '6,3');
            $editor->addChoice('6,4', '6,4');
            $editor->addChoice('6,5', '6,5');
            $editor->addChoice('6,6', '6,6');
            $editor->addChoice('6,7', '6,7');
            $editor->addChoice('6,8', '6,8');
            $editor->addChoice('6,9', '6,9');
            $editor->addChoice('7,0', '7,0');
            $editColumn = new CustomEditColumn('L1_Nota', 'Nota Lateral 1', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Nome Lateral 2 field
            //
            $editor = new ComboBox('nome_lateral_2_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Shihan Paulo Misumi', 'Shihan Paulo Misumi');
            $editor->addChoice('Sensei Gilberto ConceiÃ§Ã£o', 'Sensei Gilberto ConceiÃ§Ã£o');
            $editor->addChoice('Senpai Rodrigo Silva', 'Senpai Rodrigo Silva');
            $editor->addChoice('Sensei Oziel Alexandre', 'Sensei Oziel Alexandre');
            $editor->addChoice('Sensei Anderson Moraes', 'Sensei Anderson Moraes');
            $editor->addChoice('Sensei Murilo Hortolan', 'Sensei Murilo Hortolan');
            $editor->addChoice('Sensei Fernando Roller', 'Sensei Fernando Roller');
            $editor->addChoice('Sensei Thais Carolina', 'Sensei Thais Carolina');
            $editor->addChoice('Sensei Cristiano Silva', 'Sensei Cristiano Silva');
            $editor->addChoice('Sensei Jose Ribeiro', 'Sensei Jose Ribeiro');
            $editor->addChoice('Sensei Rogerio Baltazar', 'Sensei Rogerio Baltazar');
            $editor->addChoice('Sensei JoÃ£o Paulo Portugal', 'Sensei JoÃ£o Paulo Portugal');
            $editor->addChoice('Sensei Bianca Pereira', 'Sensei Bianca Pereira');
            $editor->addChoice('Senpai Carla', 'Senpai Carla');
            $editColumn = new CustomEditColumn('Lateral 2', 'Nome Lateral 2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Nota Lateral 2 field
            //
            $editor = new ComboBox('nota_lateral_2_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('5,0', '5,0');
            $editor->addChoice('5,1', '5,1');
            $editor->addChoice('5,2', '5,2');
            $editor->addChoice('5,3', '5,3');
            $editor->addChoice('5,4', '5,4');
            $editor->addChoice('5,5', '5,5');
            $editor->addChoice('5,6', '5,6');
            $editor->addChoice('5,7', '5,7');
            $editor->addChoice('5,8', '5,8');
            $editor->addChoice('5,9', '5,9');
            $editor->addChoice('6,0', '6,0');
            $editor->addChoice('6,1', '6,1');
            $editor->addChoice('6,2', '6,2');
            $editor->addChoice('6,3', '6,3');
            $editor->addChoice('6,4', '6,4');
            $editor->addChoice('6,5', '6,5');
            $editor->addChoice('6,6', '6,6');
            $editor->addChoice('6,7', '6,7');
            $editor->addChoice('6,8', '6,8');
            $editor->addChoice('6,9', '6,9');
            $editor->addChoice('7,0', '7,0');
            $editColumn = new CustomEditColumn('L2_Nota', 'Nota Lateral 2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Nome Lateral 3 field
            //
            $editor = new ComboBox('nome_lateral_3_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Shihan Paulo Misumi', 'Shihan Paulo Misumi');
            $editor->addChoice('Sensei Gilberto ConceiÃ§Ã£o', 'Sensei Gilberto ConceiÃ§Ã£o');
            $editor->addChoice('Senpai Rodrigo Silva', 'Senpai Rodrigo Silva');
            $editor->addChoice('Sensei Oziel Alexandre', 'Sensei Oziel Alexandre');
            $editor->addChoice('Sensei Anderson Moraes', 'Sensei Anderson Moraes');
            $editor->addChoice('Sensei Murilo Hortolan', 'Sensei Murilo Hortolan');
            $editor->addChoice('Sensei Fernando Roller', 'Sensei Fernando Roller');
            $editor->addChoice('Sensei Thais Carolina', 'Sensei Thais Carolina');
            $editor->addChoice('Sensei Cristiano Silva', 'Sensei Cristiano Silva');
            $editor->addChoice('Sensei Jose Ribeiro', 'Sensei Jose Ribeiro');
            $editor->addChoice('Sensei Rogerio Baltazar', 'Sensei Rogerio Baltazar');
            $editor->addChoice('Sensei JoÃ£o Paulo Portugal', 'Sensei JoÃ£o Paulo Portugal');
            $editor->addChoice('Sensei Bianca Pereira', 'Sensei Bianca Pereira');
            $editor->addChoice('Senpai Carla', 'Senpai Carla');
            $editColumn = new CustomEditColumn('Lateral 3', 'Nome Lateral 3', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Nota Lateral 3 field
            //
            $editor = new ComboBox('nota_lateral_3_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('5,0', '5,0');
            $editor->addChoice('5,1', '5,1');
            $editor->addChoice('5,2', '5,2');
            $editor->addChoice('5,3', '5,3');
            $editor->addChoice('5,4', '5,4');
            $editor->addChoice('5,5', '5,5');
            $editor->addChoice('5,6', '5,6');
            $editor->addChoice('5,7', '5,7');
            $editor->addChoice('5,8', '5,8');
            $editor->addChoice('5,9', '5,9');
            $editor->addChoice('6,0', '6,0');
            $editor->addChoice('6,1', '6,1');
            $editor->addChoice('6,2', '6,2');
            $editor->addChoice('6,3', '6,3');
            $editor->addChoice('6,4', '6,4');
            $editor->addChoice('6,5', '6,5');
            $editor->addChoice('6,6', '6,6');
            $editor->addChoice('6,7', '6,7');
            $editor->addChoice('6,8', '6,8');
            $editor->addChoice('6,9', '6,9');
            $editor->addChoice('7,0', '7,0');
            $editColumn = new CustomEditColumn('L3_Nota', 'Nota Lateral 3', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Nome Lateral 4 field
            //
            $editor = new ComboBox('nome_lateral_4_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Shihan Paulo Misumi', 'Shihan Paulo Misumi');
            $editor->addChoice('Sensei Gilberto ConceiÃ§Ã£o', 'Sensei Gilberto ConceiÃ§Ã£o');
            $editor->addChoice('Senpai Rodrigo Silva', 'Senpai Rodrigo Silva');
            $editor->addChoice('Sensei Oziel Alexandre', 'Sensei Oziel Alexandre');
            $editor->addChoice('Sensei Anderson Moraes', 'Sensei Anderson Moraes');
            $editor->addChoice('Sensei Murilo Hortolan', 'Sensei Murilo Hortolan');
            $editor->addChoice('Sensei Fernando Roller', 'Sensei Fernando Roller');
            $editor->addChoice('Sensei Thais Carolina', 'Sensei Thais Carolina');
            $editor->addChoice('Sensei Cristiano Silva', 'Sensei Cristiano Silva');
            $editor->addChoice('Sensei Jose Ribeiro', 'Sensei Jose Ribeiro');
            $editor->addChoice('Sensei Rogerio Baltazar', 'Sensei Rogerio Baltazar');
            $editor->addChoice('Sensei JoÃ£o Paulo Portugal', 'Sensei JoÃ£o Paulo Portugal');
            $editor->addChoice('Sensei Bianca Pereira', 'Sensei Bianca Pereira');
            $editor->addChoice('Senpai Carla', 'Senpai Carla');
            $editColumn = new CustomEditColumn('Lateral 4', 'Nome Lateral 4', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Nota Lateral 4 field
            //
            $editor = new ComboBox('nota_lateral_4_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('5,0', '5,0');
            $editor->addChoice('5,1', '5,1');
            $editor->addChoice('5,2', '5,2');
            $editor->addChoice('5,3', '5,3');
            $editor->addChoice('5,4', '5,4');
            $editor->addChoice('5,5', '5,5');
            $editor->addChoice('5,6', '5,6');
            $editor->addChoice('5,7', '5,7');
            $editor->addChoice('5,8', '5,8');
            $editor->addChoice('5,9', '5,9');
            $editor->addChoice('6,0', '6,0');
            $editor->addChoice('6,1', '6,1');
            $editor->addChoice('6,2', '6,2');
            $editor->addChoice('6,3', '6,3');
            $editor->addChoice('6,4', '6,4');
            $editor->addChoice('6,5', '6,5');
            $editor->addChoice('6,6', '6,6');
            $editor->addChoice('6,7', '6,7');
            $editor->addChoice('6,8', '6,8');
            $editor->addChoice('6,9', '6,9');
            $editor->addChoice('7,0', '7,0');
            $editColumn = new CustomEditColumn('L4_Nota', 'Nota Lateral 4', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddMultiEditColumns(Grid $grid)
        {
            //
            // Edit column for Nome Central field
            //
            $editor = new ComboBox('nome_central_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Shihan Cesar Maximiano', 'Shihan Cesar Maximiano');
            $editor->addChoice('Shihan Alexandre Prates', 'Shihan Alexandre Prates');
            $editor->addChoice('Sensei Andre Bacci', 'Sensei Andre Bacci');
            $editColumn = new CustomEditColumn('Central', 'Nome Central', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for Nota Central field
            //
            $editor = new ComboBox('nota_central_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('5,0', '5,0');
            $editor->addChoice('5,1', '5,1');
            $editor->addChoice('5,2', '5,2');
            $editor->addChoice('5,3', '5,3');
            $editor->addChoice('5,4', '5,4');
            $editor->addChoice('5,5', '5,5');
            $editor->addChoice('5,6', '5,6');
            $editor->addChoice('5,7', '5,7');
            $editor->addChoice('5,8', '5,8');
            $editor->addChoice('5,9', '5,9');
            $editor->addChoice('6,0', '6,0');
            $editor->addChoice('6,1', '6,1');
            $editor->addChoice('6,2', '6,2');
            $editor->addChoice('6,3', '6,3');
            $editor->addChoice('6,4', '6,4');
            $editor->addChoice('6,5', '6,5');
            $editor->addChoice('6,6', '6,6');
            $editor->addChoice('6,7', '6,7');
            $editor->addChoice('6,8', '6,8');
            $editor->addChoice('6,9', '6,9');
            $editor->addChoice('7,0', '7,0');
            $editColumn = new CustomEditColumn('C_Nota', 'Nota Central', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for Nome Lateral 1 field
            //
            $editor = new ComboBox('nome_lateral_1_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Shihan Paulo Misumi', 'Shihan Paulo Misumi');
            $editor->addChoice('Sensei Gilberto ConceiÃ§Ã£o', 'Sensei Gilberto ConceiÃ§Ã£o');
            $editor->addChoice('Senpai Rodrigo Silva', 'Senpai Rodrigo Silva');
            $editor->addChoice('Sensei Oziel Alexandre', 'Sensei Oziel Alexandre');
            $editor->addChoice('Sensei Anderson Moraes', 'Sensei Anderson Moraes');
            $editor->addChoice('Sensei Murilo Hortolan', 'Sensei Murilo Hortolan');
            $editor->addChoice('Sensei Fernando Roller', 'Sensei Fernando Roller');
            $editor->addChoice('Sensei Thais Carolina', 'Sensei Thais Carolina');
            $editor->addChoice('Sensei Cristiano Silva', 'Sensei Cristiano Silva');
            $editor->addChoice('Sensei Jose Ribeiro', 'Sensei Jose Ribeiro');
            $editor->addChoice('Sensei Rogerio Baltazar', 'Sensei Rogerio Baltazar');
            $editor->addChoice('Sensei JoÃ£o Paulo Portugal', 'Sensei JoÃ£o Paulo Portugal');
            $editor->addChoice('Sensei Bianca Pereira', 'Sensei Bianca Pereira');
            $editor->addChoice('Senpai Carla', 'Senpai Carla');
            $editColumn = new CustomEditColumn('Lateral 1', 'Nome Lateral 1', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for Nota Lateral 1 field
            //
            $editor = new ComboBox('nota_lateral_1_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('5,0', '5,0');
            $editor->addChoice('5,1', '5,1');
            $editor->addChoice('5,2', '5,2');
            $editor->addChoice('5,3', '5,3');
            $editor->addChoice('5,4', '5,4');
            $editor->addChoice('5,5', '5,5');
            $editor->addChoice('5,6', '5,6');
            $editor->addChoice('5,7', '5,7');
            $editor->addChoice('5,8', '5,8');
            $editor->addChoice('5,9', '5,9');
            $editor->addChoice('6,0', '6,0');
            $editor->addChoice('6,1', '6,1');
            $editor->addChoice('6,2', '6,2');
            $editor->addChoice('6,3', '6,3');
            $editor->addChoice('6,4', '6,4');
            $editor->addChoice('6,5', '6,5');
            $editor->addChoice('6,6', '6,6');
            $editor->addChoice('6,7', '6,7');
            $editor->addChoice('6,8', '6,8');
            $editor->addChoice('6,9', '6,9');
            $editor->addChoice('7,0', '7,0');
            $editColumn = new CustomEditColumn('L1_Nota', 'Nota Lateral 1', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for Nome Lateral 2 field
            //
            $editor = new ComboBox('nome_lateral_2_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Shihan Paulo Misumi', 'Shihan Paulo Misumi');
            $editor->addChoice('Sensei Gilberto ConceiÃ§Ã£o', 'Sensei Gilberto ConceiÃ§Ã£o');
            $editor->addChoice('Senpai Rodrigo Silva', 'Senpai Rodrigo Silva');
            $editor->addChoice('Sensei Oziel Alexandre', 'Sensei Oziel Alexandre');
            $editor->addChoice('Sensei Anderson Moraes', 'Sensei Anderson Moraes');
            $editor->addChoice('Sensei Murilo Hortolan', 'Sensei Murilo Hortolan');
            $editor->addChoice('Sensei Fernando Roller', 'Sensei Fernando Roller');
            $editor->addChoice('Sensei Thais Carolina', 'Sensei Thais Carolina');
            $editor->addChoice('Sensei Cristiano Silva', 'Sensei Cristiano Silva');
            $editor->addChoice('Sensei Jose Ribeiro', 'Sensei Jose Ribeiro');
            $editor->addChoice('Sensei Rogerio Baltazar', 'Sensei Rogerio Baltazar');
            $editor->addChoice('Sensei JoÃ£o Paulo Portugal', 'Sensei JoÃ£o Paulo Portugal');
            $editor->addChoice('Sensei Bianca Pereira', 'Sensei Bianca Pereira');
            $editor->addChoice('Senpai Carla', 'Senpai Carla');
            $editColumn = new CustomEditColumn('Lateral 2', 'Nome Lateral 2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for Nota Lateral 2 field
            //
            $editor = new ComboBox('nota_lateral_2_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('5,0', '5,0');
            $editor->addChoice('5,1', '5,1');
            $editor->addChoice('5,2', '5,2');
            $editor->addChoice('5,3', '5,3');
            $editor->addChoice('5,4', '5,4');
            $editor->addChoice('5,5', '5,5');
            $editor->addChoice('5,6', '5,6');
            $editor->addChoice('5,7', '5,7');
            $editor->addChoice('5,8', '5,8');
            $editor->addChoice('5,9', '5,9');
            $editor->addChoice('6,0', '6,0');
            $editor->addChoice('6,1', '6,1');
            $editor->addChoice('6,2', '6,2');
            $editor->addChoice('6,3', '6,3');
            $editor->addChoice('6,4', '6,4');
            $editor->addChoice('6,5', '6,5');
            $editor->addChoice('6,6', '6,6');
            $editor->addChoice('6,7', '6,7');
            $editor->addChoice('6,8', '6,8');
            $editor->addChoice('6,9', '6,9');
            $editor->addChoice('7,0', '7,0');
            $editColumn = new CustomEditColumn('L2_Nota', 'Nota Lateral 2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for Nome Lateral 3 field
            //
            $editor = new ComboBox('nome_lateral_3_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Shihan Paulo Misumi', 'Shihan Paulo Misumi');
            $editor->addChoice('Sensei Gilberto ConceiÃ§Ã£o', 'Sensei Gilberto ConceiÃ§Ã£o');
            $editor->addChoice('Senpai Rodrigo Silva', 'Senpai Rodrigo Silva');
            $editor->addChoice('Sensei Oziel Alexandre', 'Sensei Oziel Alexandre');
            $editor->addChoice('Sensei Anderson Moraes', 'Sensei Anderson Moraes');
            $editor->addChoice('Sensei Murilo Hortolan', 'Sensei Murilo Hortolan');
            $editor->addChoice('Sensei Fernando Roller', 'Sensei Fernando Roller');
            $editor->addChoice('Sensei Thais Carolina', 'Sensei Thais Carolina');
            $editor->addChoice('Sensei Cristiano Silva', 'Sensei Cristiano Silva');
            $editor->addChoice('Sensei Jose Ribeiro', 'Sensei Jose Ribeiro');
            $editor->addChoice('Sensei Rogerio Baltazar', 'Sensei Rogerio Baltazar');
            $editor->addChoice('Sensei JoÃ£o Paulo Portugal', 'Sensei JoÃ£o Paulo Portugal');
            $editor->addChoice('Sensei Bianca Pereira', 'Sensei Bianca Pereira');
            $editor->addChoice('Senpai Carla', 'Senpai Carla');
            $editColumn = new CustomEditColumn('Lateral 3', 'Nome Lateral 3', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for Nota Lateral 3 field
            //
            $editor = new ComboBox('nota_lateral_3_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('5,0', '5,0');
            $editor->addChoice('5,1', '5,1');
            $editor->addChoice('5,2', '5,2');
            $editor->addChoice('5,3', '5,3');
            $editor->addChoice('5,4', '5,4');
            $editor->addChoice('5,5', '5,5');
            $editor->addChoice('5,6', '5,6');
            $editor->addChoice('5,7', '5,7');
            $editor->addChoice('5,8', '5,8');
            $editor->addChoice('5,9', '5,9');
            $editor->addChoice('6,0', '6,0');
            $editor->addChoice('6,1', '6,1');
            $editor->addChoice('6,2', '6,2');
            $editor->addChoice('6,3', '6,3');
            $editor->addChoice('6,4', '6,4');
            $editor->addChoice('6,5', '6,5');
            $editor->addChoice('6,6', '6,6');
            $editor->addChoice('6,7', '6,7');
            $editor->addChoice('6,8', '6,8');
            $editor->addChoice('6,9', '6,9');
            $editor->addChoice('7,0', '7,0');
            $editColumn = new CustomEditColumn('L3_Nota', 'Nota Lateral 3', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for Nome Lateral 4 field
            //
            $editor = new ComboBox('nome_lateral_4_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Shihan Paulo Misumi', 'Shihan Paulo Misumi');
            $editor->addChoice('Sensei Gilberto ConceiÃ§Ã£o', 'Sensei Gilberto ConceiÃ§Ã£o');
            $editor->addChoice('Senpai Rodrigo Silva', 'Senpai Rodrigo Silva');
            $editor->addChoice('Sensei Oziel Alexandre', 'Sensei Oziel Alexandre');
            $editor->addChoice('Sensei Anderson Moraes', 'Sensei Anderson Moraes');
            $editor->addChoice('Sensei Murilo Hortolan', 'Sensei Murilo Hortolan');
            $editor->addChoice('Sensei Fernando Roller', 'Sensei Fernando Roller');
            $editor->addChoice('Sensei Thais Carolina', 'Sensei Thais Carolina');
            $editor->addChoice('Sensei Cristiano Silva', 'Sensei Cristiano Silva');
            $editor->addChoice('Sensei Jose Ribeiro', 'Sensei Jose Ribeiro');
            $editor->addChoice('Sensei Rogerio Baltazar', 'Sensei Rogerio Baltazar');
            $editor->addChoice('Sensei JoÃ£o Paulo Portugal', 'Sensei JoÃ£o Paulo Portugal');
            $editor->addChoice('Sensei Bianca Pereira', 'Sensei Bianca Pereira');
            $editor->addChoice('Senpai Carla', 'Senpai Carla');
            $editColumn = new CustomEditColumn('Lateral 4', 'Nome Lateral 4', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for Nota Lateral 4 field
            //
            $editor = new ComboBox('nota_lateral_4_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('5,0', '5,0');
            $editor->addChoice('5,1', '5,1');
            $editor->addChoice('5,2', '5,2');
            $editor->addChoice('5,3', '5,3');
            $editor->addChoice('5,4', '5,4');
            $editor->addChoice('5,5', '5,5');
            $editor->addChoice('5,6', '5,6');
            $editor->addChoice('5,7', '5,7');
            $editor->addChoice('5,8', '5,8');
            $editor->addChoice('5,9', '5,9');
            $editor->addChoice('6,0', '6,0');
            $editor->addChoice('6,1', '6,1');
            $editor->addChoice('6,2', '6,2');
            $editor->addChoice('6,3', '6,3');
            $editor->addChoice('6,4', '6,4');
            $editor->addChoice('6,5', '6,5');
            $editor->addChoice('6,6', '6,6');
            $editor->addChoice('6,7', '6,7');
            $editor->addChoice('6,8', '6,8');
            $editor->addChoice('6,9', '6,9');
            $editor->addChoice('7,0', '7,0');
            $editColumn = new CustomEditColumn('L4_Nota', 'Nota Lateral 4', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for Categoria field
            //
            $editor = new ComboBox('categoria_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('01 - KATA INDIVIDUAL MASCULINO IDADE 5 A 8 ANOS FAIXA(S) BRANCA E LARANJA', '01 - KATA INDIVIDUAL MASCULINO IDADE 5 A 8 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('02 - KATA INDIVIDUAL MASCULINO IDADE 5 A 8 ANOS FAIXA(S) AZUL E AMARELA', '02 - KATA INDIVIDUAL MASCULINO IDADE 5 A 8 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('03 - KATA INDIVIDUAL MASCULINO IDADE 9 A 11 ANOS FAIXA(S) BRANCA E LARANJA', '03 - KATA INDIVIDUAL MASCULINO IDADE 9 A 11 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('04 - KATA INDIVIDUAL MASCULINO IDADE 9 A 11 ANOS FAIXA(S) AZUL E AMARELA', '04 - KATA INDIVIDUAL MASCULINO IDADE 9 A 11 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('05 - KATA INDIVIDUAL MASCULINO IDADE 9 A 11 ANOS FAIXA(S) VERDE E MARROM', '05 - KATA INDIVIDUAL MASCULINO IDADE 9 A 11 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('06 - KATA INDIVIDUAL MASCULINO IDADE 12 A 14 ANOS FAIXA(S) BRANCA E LARANJA', '06 - KATA INDIVIDUAL MASCULINO IDADE 12 A 14 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('07 - KATA INDIVIDUAL MASCULINO IDADE 12 A 14 ANOS FAIXA(S) AZUL E AMARELA', '07 - KATA INDIVIDUAL MASCULINO IDADE 12 A 14 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('08 - KATA INDIVIDUAL MASCULINO IDADE 12 A 14 ANOS FAIXA(S) VERDE E MARROM', '08 - KATA INDIVIDUAL MASCULINO IDADE 12 A 14 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('09 - KATA INDIVIDUAL MASCULINO IDADE 12 A 14 ANOS FAIXA(S) PRETA', '09 - KATA INDIVIDUAL MASCULINO IDADE 12 A 14 ANOS FAIXA(S) PRETA');
            $editor->addChoice('10 - KATA INDIVIDUAL MASCULINO IDADE 15 A 17 ANOS FAIXA(S) BRANCA E LARANJA', '10 - KATA INDIVIDUAL MASCULINO IDADE 15 A 17 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('11 - KATA INDIVIDUAL MASCULINO IDADE 15 A 17 ANOS FAIXA(S) AZUL E AMARELA', '11 - KATA INDIVIDUAL MASCULINO IDADE 15 A 17 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('12 - KATA INDIVIDUAL MASCULINO IDADE 15 A 17 ANOS FAIXA(S) VERDE E MARROM', '12 - KATA INDIVIDUAL MASCULINO IDADE 15 A 17 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('13 - KATA INDIVIDUAL MASCULINO IDADE 15 A 17 ANOS FAIXA(S) PRETA', '13 - KATA INDIVIDUAL MASCULINO IDADE 15 A 17 ANOS FAIXA(S) PRETA');
            $editor->addChoice('14 - KATA INDIVIDUAL MASCULINO IDADE 18 A 23 ANOS FAIXA(S) BRANCA E LARANJA', '14 - KATA INDIVIDUAL MASCULINO IDADE 18 A 23 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('15 - KATA INDIVIDUAL MASCULINO IDADE 18 A 23 ANOS FAIXA(S) AZUL E AMARELA', '15 - KATA INDIVIDUAL MASCULINO IDADE 18 A 23 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('16 - KATA INDIVIDUAL MASCULINO IDADE 18 A 23 ANOS FAIXA(S) VERDE E MARROM', '16 - KATA INDIVIDUAL MASCULINO IDADE 18 A 23 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('17 - KATA INDIVIDUAL MASCULINO IDADE 18 A 23 ANOS FAIXA(S) PRETA', '17 - KATA INDIVIDUAL MASCULINO IDADE 18 A 23 ANOS FAIXA(S) PRETA');
            $editor->addChoice('18 - KATA INDIVIDUAL MASCULINO IDADE 24 A 29 ANOS FAIXA(S) BRANCA E LARANJA', '18 - KATA INDIVIDUAL MASCULINO IDADE 24 A 29 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('19 - KATA INDIVIDUAL MASCULINO IDADE 24 A 29 ANOS FAIXA(S) AZUL E AMARELA', '19 - KATA INDIVIDUAL MASCULINO IDADE 24 A 29 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('20 - KATA INDIVIDUAL MASCULINO IDADE 24 A 29 ANOS FAIXA(S) VERDE E MARROM', '20 - KATA INDIVIDUAL MASCULINO IDADE 24 A 29 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('21 - KATA INDIVIDUAL MASCULINO IDADE 24 A 29 ANOS FAIXA(S) PRETA', '21 - KATA INDIVIDUAL MASCULINO IDADE 24 A 29 ANOS FAIXA(S) PRETA');
            $editor->addChoice('22 - KATA INDIVIDUAL MASCULINO IDADE 30 A 35 ANOS FAIXA(S) BRANCA E LARANJA', '22 - KATA INDIVIDUAL MASCULINO IDADE 30 A 35 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('23 - KATA INDIVIDUAL MASCULINO IDADE 30 A 35 ANOS FAIXA(S) AZUL E AMARELA', '23 - KATA INDIVIDUAL MASCULINO IDADE 30 A 35 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('24 - KATA INDIVIDUAL MASCULINO IDADE 30 A 35 ANOS FAIXA(S) VERDE E MARROM', '24 - KATA INDIVIDUAL MASCULINO IDADE 30 A 35 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('25 - KATA INDIVIDUAL MASCULINO IDADE 30 A 35 ANOS FAIXA(S) PRETA', '25 - KATA INDIVIDUAL MASCULINO IDADE 30 A 35 ANOS FAIXA(S) PRETA');
            $editor->addChoice('26 - KATA INDIVIDUAL MASCULINO IDADE 36 A 43 ANOS FAIXA(S) BRANCA E LARANJA', '26 - KATA INDIVIDUAL MASCULINO IDADE 36 A 43 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('27 - KATA INDIVIDUAL MASCULINO IDADE 36 A 43 ANOS FAIXA(S) AZUL E AMARELA', '27 - KATA INDIVIDUAL MASCULINO IDADE 36 A 43 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('28 - KATA INDIVIDUAL MASCULINO IDADE 36 A 43 ANOS FAIXA(S) VERDE E MARROM', '28 - KATA INDIVIDUAL MASCULINO IDADE 36 A 43 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('29 - KATA INDIVIDUAL MASCULINO IDADE 36 A 43 ANOS FAIXA(S) PRETA', '29 - KATA INDIVIDUAL MASCULINO IDADE 36 A 43 ANOS FAIXA(S) PRETA');
            $editor->addChoice('30 - KATA INDIVIDUAL MASCULINO IDADE 44 A 52 ANOS FAIXA(S) BRANCA E LARANJA', '30 - KATA INDIVIDUAL MASCULINO IDADE 44 A 52 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('31 - KATA INDIVIDUAL MASCULINO IDADE 44 A 52 ANOS FAIXA(S) AZUL E AMARELA', '31 - KATA INDIVIDUAL MASCULINO IDADE 44 A 52 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('32 - KATA INDIVIDUAL MASCULINO IDADE 44 A 52 ANOS FAIXA(S) VERDE E MARROM', '32 - KATA INDIVIDUAL MASCULINO IDADE 44 A 52 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('33 - KATA INDIVIDUAL MASCULINO IDADE 44 A 52 ANOS FAIXA(S) PRETA', '33 - KATA INDIVIDUAL MASCULINO IDADE 44 A 52 ANOS FAIXA(S) PRETA');
            $editor->addChoice('34 - KATA INDIVIDUAL MASCULINO IDADE 53 A 59 ANOS FAIXA(S) BRANCA E LARANJA', '34 - KATA INDIVIDUAL MASCULINO IDADE 53 A 59 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('35 - KATA INDIVIDUAL MASCULINO IDADE 53 A 59 ANOS FAIXA(S) AZUL E AMARELA', '35 - KATA INDIVIDUAL MASCULINO IDADE 53 A 59 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('36 - KATA INDIVIDUAL MASCULINO IDADE 53 A 59 ANOS FAIXA(S) VERDE E MARROM', '36 - KATA INDIVIDUAL MASCULINO IDADE 53 A 59 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('37 - KATA INDIVIDUAL MASCULINO IDADE 53 A 59 ANOS FAIXA(S) PRETA', '37 - KATA INDIVIDUAL MASCULINO IDADE 53 A 59 ANOS FAIXA(S) PRETA');
            $editor->addChoice('38 - KATA INDIVIDUAL FEMININO IDADE 5 A 8 ANOS FAIXA(S) BRANCA E LARANJA', '38 - KATA INDIVIDUAL FEMININO IDADE 5 A 8 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('39 - KATA INDIVIDUAL FEMININO IDADE 5 A 8 ANOS FAIXA(S) AZUL E AMARELA', '39 - KATA INDIVIDUAL FEMININO IDADE 5 A 8 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('40 - KATA INDIVIDUAL FEMININO IDADE 9 A 11 ANOS FAIXA(S) BRANCA E LARANJA', '40 - KATA INDIVIDUAL FEMININO IDADE 9 A 11 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('41 - KATA INDIVIDUAL FEMININO IDADE 9 A 11 ANOS FAIXA(S) AZUL E AMARELA', '41 - KATA INDIVIDUAL FEMININO IDADE 9 A 11 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('42 - KATA INDIVIDUAL FEMININO IDADE 9 A 11 ANOS FAIXA(S) VERDE E MARROM', '42 - KATA INDIVIDUAL FEMININO IDADE 9 A 11 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('43 - KATA INDIVIDUAL FEMININO IDADE 12 A 14 ANOS FAIXA(S) BRANCA E LARANJA', '43 - KATA INDIVIDUAL FEMININO IDADE 12 A 14 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('44 - KATA INDIVIDUAL FEMININO IDADE 12 A 14 ANOS FAIXA(S) AZUL E AMARELA', '44 - KATA INDIVIDUAL FEMININO IDADE 12 A 14 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('45 - KATA INDIVIDUAL FEMININO IDADE 12 A 14 ANOS FAIXA(S) VERDE E MARROM', '45 - KATA INDIVIDUAL FEMININO IDADE 12 A 14 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('46 - KATA INDIVIDUAL FEMININO IDADE 12 A 14 ANOS FAIXA(S) PRETA', '46 - KATA INDIVIDUAL FEMININO IDADE 12 A 14 ANOS FAIXA(S) PRETA');
            $editor->addChoice('47 - KATA INDIVIDUAL FEMININO IDADE 15 A 17 ANOS FAIXA(S) BRANCA E LARANJA', '47 - KATA INDIVIDUAL FEMININO IDADE 15 A 17 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('48 - KATA INDIVIDUAL FEMININO IDADE 15 A 17 ANOS FAIXA(S) AZUL E AMARELA', '48 - KATA INDIVIDUAL FEMININO IDADE 15 A 17 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('49 - KATA INDIVIDUAL FEMININO IDADE 15 A 17 ANOS FAIXA(S) VERDE E MARROM', '49 - KATA INDIVIDUAL FEMININO IDADE 15 A 17 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('50 - KATA INDIVIDUAL FEMININO IDADE 15 A 17 ANOS FAIXA(S) PRETA', '50 - KATA INDIVIDUAL FEMININO IDADE 15 A 17 ANOS FAIXA(S) PRETA');
            $editor->addChoice('51 - KATA INDIVIDUAL FEMININO IDADE 18 A 23 ANOS FAIXA(S) BRANCA E LARANJA', '51 - KATA INDIVIDUAL FEMININO IDADE 18 A 23 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('52 - KATA INDIVIDUAL FEMININO IDADE 18 A 23 ANOS FAIXA(S) AZUL E AMARELA', '52 - KATA INDIVIDUAL FEMININO IDADE 18 A 23 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('53 - KATA INDIVIDUAL FEMININO IDADE 18 A 23 ANOS FAIXA(S) VERDE E MARROM', '53 - KATA INDIVIDUAL FEMININO IDADE 18 A 23 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('54 - KATA INDIVIDUAL FEMININO IDADE 18 A 23 ANOS FAIXA(S) PRETA', '54 - KATA INDIVIDUAL FEMININO IDADE 18 A 23 ANOS FAIXA(S) PRETA');
            $editor->addChoice('55 - KATA INDIVIDUAL FEMININO IDADE 24 A 29 ANOS FAIXA(S) BRANCA E LARANJA', '55 - KATA INDIVIDUAL FEMININO IDADE 24 A 29 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('56 - KATA INDIVIDUAL FEMININO IDADE 24 A 29 ANOS FAIXA(S) AZUL E AMARELA', '56 - KATA INDIVIDUAL FEMININO IDADE 24 A 29 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('57 - KATA INDIVIDUAL FEMININO IDADE 24 A 29 ANOS FAIXA(S) VERDE E MARROM', '57 - KATA INDIVIDUAL FEMININO IDADE 24 A 29 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('58 - KATA INDIVIDUAL FEMININO IDADE 24 A 29 ANOS FAIXA(S) PRETA', '58 - KATA INDIVIDUAL FEMININO IDADE 24 A 29 ANOS FAIXA(S) PRETA');
            $editor->addChoice('59 - KATA INDIVIDUAL FEMININO IDADE 30 A 35 ANOS FAIXA(S) BRANCA E LARANJA', '59 - KATA INDIVIDUAL FEMININO IDADE 30 A 35 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('60 - KATA INDIVIDUAL FEMININO IDADE 30 A 35 ANOS FAIXA(S) AZUL E AMARELA', '60 - KATA INDIVIDUAL FEMININO IDADE 30 A 35 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('61 - KATA INDIVIDUAL FEMININO IDADE 30 A 35 ANOS FAIXA(S) VERDE E MARROM', '61 - KATA INDIVIDUAL FEMININO IDADE 30 A 35 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('62 - KATA INDIVIDUAL FEMININO IDADE 30 A 35 ANOS FAIXA(S) PRETA', '62 - KATA INDIVIDUAL FEMININO IDADE 30 A 35 ANOS FAIXA(S) PRETA');
            $editor->addChoice('63 - KATA INDIVIDUAL FEMININO IDADE 36 A 43 ANOS FAIXA(S) BRANCA E LARANJA', '63 - KATA INDIVIDUAL FEMININO IDADE 36 A 43 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('64 - KATA INDIVIDUAL FEMININO IDADE 36 A 43 ANOS FAIXA(S) AZUL E AMARELA', '64 - KATA INDIVIDUAL FEMININO IDADE 36 A 43 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('65 - KATA INDIVIDUAL FEMININO IDADE 36 A 43 ANOS FAIXA(S) VERDE E MARROM', '65 - KATA INDIVIDUAL FEMININO IDADE 36 A 43 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('66 - KATA INDIVIDUAL FEMININO IDADE 36 A 43 ANOS FAIXA(S) PRETA', '66 - KATA INDIVIDUAL FEMININO IDADE 36 A 43 ANOS FAIXA(S) PRETA');
            $editor->addChoice('67 - KATA INDIVIDUAL FEMININO IDADE 44 A 52 ANOS FAIXA(S) BRANCA E LARANJA', '67 - KATA INDIVIDUAL FEMININO IDADE 44 A 52 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('68 - KATA INDIVIDUAL FEMININO IDADE 44 A 52 ANOS FAIXA(S) AZUL E AMARELA', '68 - KATA INDIVIDUAL FEMININO IDADE 44 A 52 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('69 - KATA INDIVIDUAL FEMININO IDADE 44 A 52 ANOS FAIXA(S) VERDE E MARROM', '69 - KATA INDIVIDUAL FEMININO IDADE 44 A 52 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('70 - KATA INDIVIDUAL FEMININO IDADE 44 A 52 ANOS FAIXA(S) PRETA', '70 - KATA INDIVIDUAL FEMININO IDADE 44 A 52 ANOS FAIXA(S) PRETA');
            $editor->addChoice('71 - KATA INDIVIDUAL FEMININO IDADE 53 A 59 ANOS FAIXA(S) BRANCA E LARANJA', '71 - KATA INDIVIDUAL FEMININO IDADE 53 A 59 ANOS FAIXA(S) BRANCA E LARANJA');
            $editor->addChoice('72 - KATA INDIVIDUAL FEMININO IDADE 53 A 59 ANOS FAIXA(S) AZUL E AMARELA', '72 - KATA INDIVIDUAL FEMININO IDADE 53 A 59 ANOS FAIXA(S) AZUL E AMARELA');
            $editor->addChoice('73 - KATA INDIVIDUAL FEMININO IDADE 53 A 59 ANOS FAIXA(S) VERDE E MARROM', '73 - KATA INDIVIDUAL FEMININO IDADE 53 A 59 ANOS FAIXA(S) VERDE E MARROM');
            $editor->addChoice('74 - KATA INDIVIDUAL FEMININO IDADE 53 A 59 ANOS FAIXA(S) PRETA', '74 - KATA INDIVIDUAL FEMININO IDADE 53 A 59 ANOS FAIXA(S) PRETA');
            $editor->addChoice('75 - KATA INDIVIDUAL MISTO IDADE 5 A 8 ANOS FAIXA(S) ABSOLUTO', '75 - KATA INDIVIDUAL MISTO IDADE 5 A 8 ANOS FAIXA(S) ABSOLUTO');
            $editor->addChoice('76 - KATA INDIVIDUAL MISTO IDADE 9 A 11 ANOS FAIXA(S) ABSOLUTO', '76 - KATA INDIVIDUAL MISTO IDADE 9 A 11 ANOS FAIXA(S) ABSOLUTO');
            $editor->addChoice('78 - KATA INDIVIDUAL MISTO IDADE 12 A 14 ANOS FAIXA(S) ABSOLUTO', '78 - KATA INDIVIDUAL MISTO IDADE 12 A 14 ANOS FAIXA(S) ABSOLUTO');
            $editor->addChoice('80 - KATA INDIVIDUAL MISTO IDADE 15 A 17 ANOS FAIXA(S) ABSOLUTO', '80 - KATA INDIVIDUAL MISTO IDADE 15 A 17 ANOS FAIXA(S) ABSOLUTO');
            $editor->addChoice('81 - KATA INDIVIDUAL MISTO IDADE 18 A 59 ANOS FAIXA(S) ABSOLUTO', '81 - KATA INDIVIDUAL MISTO IDADE 18 A 59 ANOS FAIXA(S) ABSOLUTO');
            $editor->addChoice('83 - KATA EQUIPE MASCULINO IDADE 5 A 14 ANOS FAIXA(S) - FAIXA(S) ABSOLUTO', '83 - KATA EQUIPE MASCULINO IDADE 5 A 14 ANOS FAIXA(S) - FAIXA(S) ABSOLUTO');
            $editor->addChoice('84 - KATA EQUIPE FEMININO IDADE 5 A 14 ANOS FAIXA(S) - FAIXA(S) ABSOLUTO', '84 - KATA EQUIPE FEMININO IDADE 5 A 14 ANOS FAIXA(S) - FAIXA(S) ABSOLUTO');
            $editor->addChoice('85 - KATA EQUIPE MASCULINO IDADE 15 A 59 ANOS FAIXA(S) - FAIXA(S) ABSOLUTO', '85 - KATA EQUIPE MASCULINO IDADE 15 A 59 ANOS FAIXA(S) - FAIXA(S) ABSOLUTO');
            $editor->addChoice('86 - KATA EQUIPE FEMININO IDADE 15 A 59 ANOS FAIXA(S) - FAIXA(S) ABSOLUTO', '86 - KATA EQUIPE FEMININO IDADE 15 A 59 ANOS FAIXA(S) - FAIXA(S) ABSOLUTO');
            $editColumn = new CustomEditColumn('Categoria', 'Categoria', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Nome Central field
            //
            $editor = new ComboBox('nome_central_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Shihan Cesar Maximiano', 'Shihan Cesar Maximiano');
            $editor->addChoice('Shihan Alexandre Prates', 'Shihan Alexandre Prates');
            $editor->addChoice('Sensei Andre Bacci', 'Sensei Andre Bacci');
            $editColumn = new CustomEditColumn('Central', 'Nome Central', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Nota Central field
            //
            $editor = new ComboBox('nota_central_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('5,0', '5,0');
            $editor->addChoice('5,1', '5,1');
            $editor->addChoice('5,2', '5,2');
            $editor->addChoice('5,3', '5,3');
            $editor->addChoice('5,4', '5,4');
            $editor->addChoice('5,5', '5,5');
            $editor->addChoice('5,6', '5,6');
            $editor->addChoice('5,7', '5,7');
            $editor->addChoice('5,8', '5,8');
            $editor->addChoice('5,9', '5,9');
            $editor->addChoice('6,0', '6,0');
            $editor->addChoice('6,1', '6,1');
            $editor->addChoice('6,2', '6,2');
            $editor->addChoice('6,3', '6,3');
            $editor->addChoice('6,4', '6,4');
            $editor->addChoice('6,5', '6,5');
            $editor->addChoice('6,6', '6,6');
            $editor->addChoice('6,7', '6,7');
            $editor->addChoice('6,8', '6,8');
            $editor->addChoice('6,9', '6,9');
            $editor->addChoice('7,0', '7,0');
            $editColumn = new CustomEditColumn('C_Nota', 'Nota Central', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Nome Lateral 1 field
            //
            $editor = new ComboBox('nome_lateral_1_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Shihan Paulo Misumi', 'Shihan Paulo Misumi');
            $editor->addChoice('Sensei Gilberto ConceiÃ§Ã£o', 'Sensei Gilberto ConceiÃ§Ã£o');
            $editor->addChoice('Senpai Rodrigo Silva', 'Senpai Rodrigo Silva');
            $editor->addChoice('Sensei Oziel Alexandre', 'Sensei Oziel Alexandre');
            $editor->addChoice('Sensei Anderson Moraes', 'Sensei Anderson Moraes');
            $editor->addChoice('Sensei Murilo Hortolan', 'Sensei Murilo Hortolan');
            $editor->addChoice('Sensei Fernando Roller', 'Sensei Fernando Roller');
            $editor->addChoice('Sensei Thais Carolina', 'Sensei Thais Carolina');
            $editor->addChoice('Sensei Cristiano Silva', 'Sensei Cristiano Silva');
            $editor->addChoice('Sensei Jose Ribeiro', 'Sensei Jose Ribeiro');
            $editor->addChoice('Sensei Rogerio Baltazar', 'Sensei Rogerio Baltazar');
            $editor->addChoice('Sensei JoÃ£o Paulo Portugal', 'Sensei JoÃ£o Paulo Portugal');
            $editor->addChoice('Sensei Bianca Pereira', 'Sensei Bianca Pereira');
            $editor->addChoice('Senpai Carla', 'Senpai Carla');
            $editColumn = new CustomEditColumn('Lateral 1', 'Nome Lateral 1', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Nota Lateral 1 field
            //
            $editor = new ComboBox('nota_lateral_1_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('5,0', '5,0');
            $editor->addChoice('5,1', '5,1');
            $editor->addChoice('5,2', '5,2');
            $editor->addChoice('5,3', '5,3');
            $editor->addChoice('5,4', '5,4');
            $editor->addChoice('5,5', '5,5');
            $editor->addChoice('5,6', '5,6');
            $editor->addChoice('5,7', '5,7');
            $editor->addChoice('5,8', '5,8');
            $editor->addChoice('5,9', '5,9');
            $editor->addChoice('6,0', '6,0');
            $editor->addChoice('6,1', '6,1');
            $editor->addChoice('6,2', '6,2');
            $editor->addChoice('6,3', '6,3');
            $editor->addChoice('6,4', '6,4');
            $editor->addChoice('6,5', '6,5');
            $editor->addChoice('6,6', '6,6');
            $editor->addChoice('6,7', '6,7');
            $editor->addChoice('6,8', '6,8');
            $editor->addChoice('6,9', '6,9');
            $editor->addChoice('7,0', '7,0');
            $editColumn = new CustomEditColumn('L1_Nota', 'Nota Lateral 1', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Nome Lateral 2 field
            //
            $editor = new ComboBox('nome_lateral_2_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Shihan Paulo Misumi', 'Shihan Paulo Misumi');
            $editor->addChoice('Sensei Gilberto ConceiÃ§Ã£o', 'Sensei Gilberto ConceiÃ§Ã£o');
            $editor->addChoice('Senpai Rodrigo Silva', 'Senpai Rodrigo Silva');
            $editor->addChoice('Sensei Oziel Alexandre', 'Sensei Oziel Alexandre');
            $editor->addChoice('Sensei Anderson Moraes', 'Sensei Anderson Moraes');
            $editor->addChoice('Sensei Murilo Hortolan', 'Sensei Murilo Hortolan');
            $editor->addChoice('Sensei Fernando Roller', 'Sensei Fernando Roller');
            $editor->addChoice('Sensei Thais Carolina', 'Sensei Thais Carolina');
            $editor->addChoice('Sensei Cristiano Silva', 'Sensei Cristiano Silva');
            $editor->addChoice('Sensei Jose Ribeiro', 'Sensei Jose Ribeiro');
            $editor->addChoice('Sensei Rogerio Baltazar', 'Sensei Rogerio Baltazar');
            $editor->addChoice('Sensei JoÃ£o Paulo Portugal', 'Sensei JoÃ£o Paulo Portugal');
            $editor->addChoice('Sensei Bianca Pereira', 'Sensei Bianca Pereira');
            $editor->addChoice('Senpai Carla', 'Senpai Carla');
            $editColumn = new CustomEditColumn('Lateral 2', 'Nome Lateral 2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Nota Lateral 2 field
            //
            $editor = new ComboBox('nota_lateral_2_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('5,0', '5,0');
            $editor->addChoice('5,1', '5,1');
            $editor->addChoice('5,2', '5,2');
            $editor->addChoice('5,3', '5,3');
            $editor->addChoice('5,4', '5,4');
            $editor->addChoice('5,5', '5,5');
            $editor->addChoice('5,6', '5,6');
            $editor->addChoice('5,7', '5,7');
            $editor->addChoice('5,8', '5,8');
            $editor->addChoice('5,9', '5,9');
            $editor->addChoice('6,0', '6,0');
            $editor->addChoice('6,1', '6,1');
            $editor->addChoice('6,2', '6,2');
            $editor->addChoice('6,3', '6,3');
            $editor->addChoice('6,4', '6,4');
            $editor->addChoice('6,5', '6,5');
            $editor->addChoice('6,6', '6,6');
            $editor->addChoice('6,7', '6,7');
            $editor->addChoice('6,8', '6,8');
            $editor->addChoice('6,9', '6,9');
            $editor->addChoice('7,0', '7,0');
            $editColumn = new CustomEditColumn('L2_Nota', 'Nota Lateral 2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Nome Lateral 3 field
            //
            $editor = new ComboBox('nome_lateral_3_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Shihan Paulo Misumi', 'Shihan Paulo Misumi');
            $editor->addChoice('Sensei Gilberto ConceiÃ§Ã£o', 'Sensei Gilberto ConceiÃ§Ã£o');
            $editor->addChoice('Senpai Rodrigo Silva', 'Senpai Rodrigo Silva');
            $editor->addChoice('Sensei Oziel Alexandre', 'Sensei Oziel Alexandre');
            $editor->addChoice('Sensei Anderson Moraes', 'Sensei Anderson Moraes');
            $editor->addChoice('Sensei Murilo Hortolan', 'Sensei Murilo Hortolan');
            $editor->addChoice('Sensei Fernando Roller', 'Sensei Fernando Roller');
            $editor->addChoice('Sensei Thais Carolina', 'Sensei Thais Carolina');
            $editor->addChoice('Sensei Cristiano Silva', 'Sensei Cristiano Silva');
            $editor->addChoice('Sensei Jose Ribeiro', 'Sensei Jose Ribeiro');
            $editor->addChoice('Sensei Rogerio Baltazar', 'Sensei Rogerio Baltazar');
            $editor->addChoice('Sensei JoÃ£o Paulo Portugal', 'Sensei JoÃ£o Paulo Portugal');
            $editor->addChoice('Sensei Bianca Pereira', 'Sensei Bianca Pereira');
            $editor->addChoice('Senpai Carla', 'Senpai Carla');
            $editColumn = new CustomEditColumn('Lateral 3', 'Nome Lateral 3', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Nota Lateral 3 field
            //
            $editor = new ComboBox('nota_lateral_3_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('5,0', '5,0');
            $editor->addChoice('5,1', '5,1');
            $editor->addChoice('5,2', '5,2');
            $editor->addChoice('5,3', '5,3');
            $editor->addChoice('5,4', '5,4');
            $editor->addChoice('5,5', '5,5');
            $editor->addChoice('5,6', '5,6');
            $editor->addChoice('5,7', '5,7');
            $editor->addChoice('5,8', '5,8');
            $editor->addChoice('5,9', '5,9');
            $editor->addChoice('6,0', '6,0');
            $editor->addChoice('6,1', '6,1');
            $editor->addChoice('6,2', '6,2');
            $editor->addChoice('6,3', '6,3');
            $editor->addChoice('6,4', '6,4');
            $editor->addChoice('6,5', '6,5');
            $editor->addChoice('6,6', '6,6');
            $editor->addChoice('6,7', '6,7');
            $editor->addChoice('6,8', '6,8');
            $editor->addChoice('6,9', '6,9');
            $editor->addChoice('7,0', '7,0');
            $editColumn = new CustomEditColumn('L3_Nota', 'Nota Lateral 3', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Nome Lateral 4 field
            //
            $editor = new ComboBox('nome_lateral_4_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Shihan Paulo Misumi', 'Shihan Paulo Misumi');
            $editor->addChoice('Sensei Gilberto ConceiÃ§Ã£o', 'Sensei Gilberto ConceiÃ§Ã£o');
            $editor->addChoice('Senpai Rodrigo Silva', 'Senpai Rodrigo Silva');
            $editor->addChoice('Sensei Oziel Alexandre', 'Sensei Oziel Alexandre');
            $editor->addChoice('Sensei Anderson Moraes', 'Sensei Anderson Moraes');
            $editor->addChoice('Sensei Murilo Hortolan', 'Sensei Murilo Hortolan');
            $editor->addChoice('Sensei Fernando Roller', 'Sensei Fernando Roller');
            $editor->addChoice('Sensei Thais Carolina', 'Sensei Thais Carolina');
            $editor->addChoice('Sensei Cristiano Silva', 'Sensei Cristiano Silva');
            $editor->addChoice('Sensei Jose Ribeiro', 'Sensei Jose Ribeiro');
            $editor->addChoice('Sensei Rogerio Baltazar', 'Sensei Rogerio Baltazar');
            $editor->addChoice('Sensei JoÃ£o Paulo Portugal', 'Sensei JoÃ£o Paulo Portugal');
            $editor->addChoice('Sensei Bianca Pereira', 'Sensei Bianca Pereira');
            $editor->addChoice('Senpai Carla', 'Senpai Carla');
            $editColumn = new CustomEditColumn('Lateral 4', 'Nome Lateral 4', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Nota Lateral 4 field
            //
            $editor = new ComboBox('nota_lateral_4_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('5,0', '5,0');
            $editor->addChoice('5,1', '5,1');
            $editor->addChoice('5,2', '5,2');
            $editor->addChoice('5,3', '5,3');
            $editor->addChoice('5,4', '5,4');
            $editor->addChoice('5,5', '5,5');
            $editor->addChoice('5,6', '5,6');
            $editor->addChoice('5,7', '5,7');
            $editor->addChoice('5,8', '5,8');
            $editor->addChoice('5,9', '5,9');
            $editor->addChoice('6,0', '6,0');
            $editor->addChoice('6,1', '6,1');
            $editor->addChoice('6,2', '6,2');
            $editor->addChoice('6,3', '6,3');
            $editor->addChoice('6,4', '6,4');
            $editor->addChoice('6,5', '6,5');
            $editor->addChoice('6,6', '6,6');
            $editor->addChoice('6,7', '6,7');
            $editor->addChoice('6,8', '6,8');
            $editor->addChoice('6,9', '6,9');
            $editor->addChoice('7,0', '7,0');
            $editColumn = new CustomEditColumn('L4_Nota', 'Nota Lateral 4', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            $grid->SetShowAddButton(true && $this->GetSecurityInfo()->HasAddGrant());
        }
    
        private function AddMultiUploadColumn(Grid $grid)
        {
    
        }
    
        protected function AddPrintColumns(Grid $grid)
        {
            //
            // View column for Categoria field
            //
            $column = new TextViewColumn('Categoria', 'Categoria', 'Categoria', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Nome Central field
            //
            $column = new TextViewColumn('Nome Central', 'Nome Central', 'Central', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Nota Central field
            //
            $column = new TextViewColumn('Nota Central', 'Nota Central', 'C_Nota', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Nome Lateral 1 field
            //
            $column = new TextViewColumn('Nome Lateral 1', 'Nome Lateral 1', 'Lateral 1', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Nota Lateral 1 field
            //
            $column = new TextViewColumn('Nota Lateral 1', 'Nota Lateral 1', 'L1_Nota', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Nome Lateral 2 field
            //
            $column = new TextViewColumn('Nome Lateral 2', 'Nome Lateral 2', 'Lateral 2', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Nota Lateral 2 field
            //
            $column = new TextViewColumn('Nota Lateral 2', 'Nota Lateral 2', 'L2_Nota', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Nome Lateral 3 field
            //
            $column = new TextViewColumn('Nome Lateral 3', 'Nome Lateral 3', 'Lateral 3', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Nota Lateral 3 field
            //
            $column = new TextViewColumn('Nota Lateral 3', 'Nota Lateral 3', 'L3_Nota', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Nome Lateral 4 field
            //
            $column = new TextViewColumn('Nome Lateral 4', 'Nome Lateral 4', 'Lateral 4', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Nota Lateral 4 field
            //
            $column = new TextViewColumn('Nota Lateral 4', 'Nota Lateral 4', 'L4_Nota', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for Categoria field
            //
            $column = new TextViewColumn('Categoria', 'Categoria', 'Categoria', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Nome Central field
            //
            $column = new TextViewColumn('Nome Central', 'Nome Central', 'Central', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Nota Central field
            //
            $column = new TextViewColumn('Nota Central', 'Nota Central', 'C_Nota', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Nome Lateral 1 field
            //
            $column = new TextViewColumn('Nome Lateral 1', 'Nome Lateral 1', 'Lateral 1', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Nota Lateral 1 field
            //
            $column = new TextViewColumn('Nota Lateral 1', 'Nota Lateral 1', 'L1_Nota', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Nome Lateral 2 field
            //
            $column = new TextViewColumn('Nome Lateral 2', 'Nome Lateral 2', 'Lateral 2', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Nota Lateral 2 field
            //
            $column = new TextViewColumn('Nota Lateral 2', 'Nota Lateral 2', 'L2_Nota', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Nome Lateral 3 field
            //
            $column = new TextViewColumn('Nome Lateral 3', 'Nome Lateral 3', 'Lateral 3', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Nota Lateral 3 field
            //
            $column = new TextViewColumn('Nota Lateral 3', 'Nota Lateral 3', 'L3_Nota', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Nome Lateral 4 field
            //
            $column = new TextViewColumn('Nome Lateral 4', 'Nome Lateral 4', 'Lateral 4', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Nota Lateral 4 field
            //
            $column = new TextViewColumn('Nota Lateral 4', 'Nota Lateral 4', 'L4_Nota', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
        }
    
        private function AddCompareColumns(Grid $grid)
        {
            //
            // View column for Categoria field
            //
            $column = new TextViewColumn('Categoria', 'Categoria', 'Categoria', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Nome Central field
            //
            $column = new TextViewColumn('Nome Central', 'Nome Central', 'Central', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Nota Central field
            //
            $column = new TextViewColumn('Nota Central', 'Nota Central', 'C_Nota', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Nome Lateral 1 field
            //
            $column = new TextViewColumn('Nome Lateral 1', 'Nome Lateral 1', 'Lateral 1', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Nota Lateral 1 field
            //
            $column = new TextViewColumn('Nota Lateral 1', 'Nota Lateral 1', 'L1_Nota', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Nome Lateral 2 field
            //
            $column = new TextViewColumn('Nome Lateral 2', 'Nome Lateral 2', 'Lateral 2', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Nota Lateral 2 field
            //
            $column = new TextViewColumn('Nota Lateral 2', 'Nota Lateral 2', 'L2_Nota', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Nome Lateral 3 field
            //
            $column = new TextViewColumn('Nome Lateral 3', 'Nome Lateral 3', 'Lateral 3', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Nota Lateral 3 field
            //
            $column = new TextViewColumn('Nota Lateral 3', 'Nota Lateral 3', 'L3_Nota', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Nome Lateral 4 field
            //
            $column = new TextViewColumn('Nome Lateral 4', 'Nome Lateral 4', 'Lateral 4', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Nota Lateral 4 field
            //
            $column = new TextViewColumn('Nota Lateral 4', 'Nota Lateral 4', 'L4_Nota', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
        }
    
        private function AddCompareHeaderColumns(Grid $grid)
        {
    
        }
    
        public function GetPageDirection()
        {
            return null;
        }
    
        public function isFilterConditionRequired()
        {
            return false;
        }
    
        protected function ApplyCommonColumnEditProperties(CustomEditColumn $column)
        {
            $column->SetDisplaySetToNullCheckBox(false);
            $column->SetDisplaySetToDefaultCheckBox(false);
    		$column->SetVariableContainer($this->GetColumnVariableContainer());
        }
    
        function GetCustomClientScript()
        {
            return ;
        }
        
        function GetOnPageLoadedClientScript()
        {
            return ;
        }
        protected function GetEnableModalGridDelete() { return true; }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset);
            if ($this->GetSecurityInfo()->HasDeleteGrant())
               $result->SetAllowDeleteSelected(true);
            else
               $result->SetAllowDeleteSelected(false);   
            
            ApplyCommonPageSettings($this, $result);
            
            $result->SetUseImagesForActions(true);
            $result->SetUseFixedHeader(false);
            $result->SetShowLineNumbers(false);
            $result->SetShowKeyColumnsImagesInHeader(false);
            $result->SetViewMode(ViewMode::CARD);
            $result->SetCardCountInRow(array(
                'lg' => 3,
                'md' => 2,
                'sm' => 1,
                'xs' => 1
            ));
            $result->setEnableRuntimeCustomization(true);
            $result->setAllowCompare(true);
            $this->AddCompareHeaderColumns($result);
            $this->AddCompareColumns($result);
            $result->setMultiEditAllowed($this->GetSecurityInfo()->HasEditGrant() && true);
            $result->setTableBordered(false);
            $result->setTableCondensed(false);
            
            $result->SetHighlightRowAtHover(true);
            $result->SetWidth('');
            $this->AddOperationsColumns($result);
            $this->AddFieldColumns($result);
            $this->AddSingleRecordViewColumns($result);
            $this->AddEditColumns($result);
            $this->AddMultiEditColumns($result);
            $this->AddInsertColumns($result);
            $this->AddPrintColumns($result);
            $this->AddExportColumns($result);
            $this->AddMultiUploadColumn($result);
    
    
            $this->SetShowPageList(true);
            $this->SetShowTopPageNavigator(true);
            $this->SetShowBottomPageNavigator(true);
            $this->setPrintListAvailable(false);
            $this->setPrintListRecordAvailable(false);
            $this->setPrintOneRecordAvailable(false);
            $this->setAllowPrintSelectedRecords(false);
            $this->setOpenPrintFormInNewTab(false);
            $this->setExportListAvailable(array('excel'));
            $this->setExportSelectedRecordsAvailable(array('excel'));
            $this->setExportListRecordAvailable(array());
            $this->setExportOneRecordAvailable(array('excel'));
            $this->setOpenExportedPdfInNewTab(false);
    
            return $result;
        }
     
        protected function setClientSideEvents(Grid $grid) {
    
        }
    
        protected function doRegisterHandlers() {
            
            
        }
       
        protected function doCustomRenderColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderPrintColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderExportColumn($exportType, $fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomDrawRow($rowData, &$cellFontColor, &$cellFontSize, &$cellBgColor, &$cellItalicAttr, &$cellBoldAttr)
        {
    
        }
    
        protected function doExtendedCustomDrawRow($rowData, &$rowCellStyles, &$rowStyles, &$rowClasses, &$cellClasses)
        {
    
        }
    
        protected function doCustomRenderTotal($totalValue, $aggregate, $columnName, &$customText, &$handled)
        {
    
        }
    
        protected function doCustomDefaultValues(&$values, &$handled) 
        {
    
        }
    
        protected function doCustomCompareColumn($columnName, $valueA, $valueB, &$result)
        {
    
        }
    
        protected function doBeforeInsertRecord($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doBeforeUpdateRecord($page, $oldRowData, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doBeforeDeleteRecord($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterInsertRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterUpdateRecord($page, $oldRowData, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterDeleteRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doCustomHTMLHeader($page, &$customHtmlHeaderText)
        { 
    
        }
    
        protected function doGetCustomTemplate($type, $part, $mode, &$result, &$params)
        {
    
        }
    
        protected function doGetCustomExportOptions(Page $page, $exportType, $rowData, &$options)
        {
    
        }
    
        protected function doFileUpload($fieldName, $rowData, &$result, &$accept, $originalFileName, $originalFileExtension, $fileSize, $tempFileName)
        {
    
        }
    
        protected function doPrepareChart(Chart $chart)
        {
    
        }
    
        protected function doPrepareColumnFilter(ColumnFilter $columnFilter)
        {
    
        }
    
        protected function doPrepareFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
    
        }
    
        protected function doGetSelectionFilters(FixedKeysArray $columns, &$result)
        {
    
        }
    
        protected function doGetCustomFormLayout($mode, FixedKeysArray $columns, FormLayout $layout)
        {
    
        }
    
        protected function doGetCustomColumnGroup(FixedKeysArray $columns, ViewColumnGroup $columnGroup)
        {
    
        }
    
        protected function doPageLoaded()
        {
    
        }
    
        protected function doCalculateFields($rowData, $fieldName, &$value)
        {
    
        }
    
        protected function doGetCustomRecordPermissions(Page $page, &$usingCondition, $rowData, &$allowEdit, &$allowDelete, &$mergeWithDefault, &$handled)
        {
    
        }
    
        protected function doAddEnvironmentVariables(Page $page, &$variables)
        {
    
        }
    
    }

    SetUpUserAuthorization();

    try
    {
        $Page = new notaarbitragemPage("notaarbitragem", "notaarbitragem.php", GetCurrentUserPermissionsForPage("notaarbitragem"), 'UTF-8');
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("notaarbitragem"));
        GetApplication()->SetMainPage($Page);
        GetApplication()->Run();
    }
    catch(Exception $e)
    {
        ShowErrorPage($e);
    }
	
