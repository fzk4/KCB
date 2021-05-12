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
    
    
    
    class staffPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->SetTitle('Staff');
            $this->SetMenuLabel('Staff');
    
            $this->dataset = new TableDataset(
                MySqlIConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`staff`');
            $this->dataset->addFields(
                array(
                    new IntegerField('ID', true, true, true),
                    new StringField('nome', true),
                    new StringField('organizacao', true),
                    new StringField('graduacao', true),
                    new StringField('endereco'),
                    new StringField('cep'),
                    new StringField('cidade', true),
                    new StringField('whatsapp'),
                    new StringField('email'),
                    new StringField('regCBKI'),
                    new StringField('cursoarb1', true),
                    new StringField('cursoarb2', true),
                    new StringField('justificativa'),
                    new StringField('atuacao', true)
                )
            );
        }
    
        protected function DoPrepare() {
    
        }
    
        protected function CreatePageNavigator()
        {
            return null;
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
                new FilterColumn($this->dataset, 'ID', 'ID', 'ID'),
                new FilterColumn($this->dataset, 'nome', 'nome', 'Nome'),
                new FilterColumn($this->dataset, 'organizacao', 'organizacao', 'Organizacao'),
                new FilterColumn($this->dataset, 'graduacao', 'graduacao', 'Graduacao'),
                new FilterColumn($this->dataset, 'endereco', 'endereco', 'Endereco'),
                new FilterColumn($this->dataset, 'cep', 'cep', 'Cep'),
                new FilterColumn($this->dataset, 'cidade', 'cidade', 'Cidade'),
                new FilterColumn($this->dataset, 'whatsapp', 'whatsapp', 'Whatsapp'),
                new FilterColumn($this->dataset, 'email', 'email', 'Email'),
                new FilterColumn($this->dataset, 'regCBKI', 'regCBKI', 'Reg CBKI'),
                new FilterColumn($this->dataset, 'cursoarb1', 'cursoarb1', 'Cursoarb1'),
                new FilterColumn($this->dataset, 'cursoarb2', 'cursoarb2', 'Cursoarb2'),
                new FilterColumn($this->dataset, 'justificativa', 'justificativa', 'Justificativa'),
                new FilterColumn($this->dataset, 'atuacao', 'atuacao', 'Atuacao')
            );
        }
    
        protected function setupQuickFilter(QuickFilter $quickFilter, FixedKeysArray $columns)
        {
    
        }
    
        protected function setupColumnFilter(ColumnFilter $columnFilter)
        {
    
        }
    
        protected function setupFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
    
        }
    
        protected function AddOperationsColumns(Grid $grid)
        {
    
        }
    
        protected function AddFieldColumns(Grid $grid, $withDetails = true)
        {
            //
            // View column for ID field
            //
            $column = new NumberViewColumn('ID', 'ID', 'ID', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for nome field
            //
            $column = new TextViewColumn('nome', 'nome', 'Nome', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for organizacao field
            //
            $column = new TextViewColumn('organizacao', 'organizacao', 'Organizacao', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for graduacao field
            //
            $column = new TextViewColumn('graduacao', 'graduacao', 'Graduacao', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for endereco field
            //
            $column = new TextViewColumn('endereco', 'endereco', 'Endereco', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for cep field
            //
            $column = new TextViewColumn('cep', 'cep', 'Cep', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for cidade field
            //
            $column = new TextViewColumn('cidade', 'cidade', 'Cidade', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for whatsapp field
            //
            $column = new TextViewColumn('whatsapp', 'whatsapp', 'Whatsapp', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for email field
            //
            $column = new TextViewColumn('email', 'email', 'Email', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for regCBKI field
            //
            $column = new TextViewColumn('regCBKI', 'regCBKI', 'Reg CBKI', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for cursoarb1 field
            //
            $column = new TextViewColumn('cursoarb1', 'cursoarb1', 'Cursoarb1', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for cursoarb2 field
            //
            $column = new TextViewColumn('cursoarb2', 'cursoarb2', 'Cursoarb2', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for justificativa field
            //
            $column = new TextViewColumn('justificativa', 'justificativa', 'Justificativa', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for atuacao field
            //
            $column = new TextViewColumn('atuacao', 'atuacao', 'Atuacao', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for ID field
            //
            $column = new NumberViewColumn('ID', 'ID', 'ID', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for nome field
            //
            $column = new TextViewColumn('nome', 'nome', 'Nome', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for organizacao field
            //
            $column = new TextViewColumn('organizacao', 'organizacao', 'Organizacao', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for graduacao field
            //
            $column = new TextViewColumn('graduacao', 'graduacao', 'Graduacao', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for endereco field
            //
            $column = new TextViewColumn('endereco', 'endereco', 'Endereco', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for cep field
            //
            $column = new TextViewColumn('cep', 'cep', 'Cep', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for cidade field
            //
            $column = new TextViewColumn('cidade', 'cidade', 'Cidade', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for whatsapp field
            //
            $column = new TextViewColumn('whatsapp', 'whatsapp', 'Whatsapp', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for email field
            //
            $column = new TextViewColumn('email', 'email', 'Email', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for regCBKI field
            //
            $column = new TextViewColumn('regCBKI', 'regCBKI', 'Reg CBKI', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for cursoarb1 field
            //
            $column = new TextViewColumn('cursoarb1', 'cursoarb1', 'Cursoarb1', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for cursoarb2 field
            //
            $column = new TextViewColumn('cursoarb2', 'cursoarb2', 'Cursoarb2', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for justificativa field
            //
            $column = new TextViewColumn('justificativa', 'justificativa', 'Justificativa', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for atuacao field
            //
            $column = new TextViewColumn('atuacao', 'atuacao', 'Atuacao', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for nome field
            //
            $editor = new TextEdit('nome_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Nome', 'nome', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for organizacao field
            //
            $editor = new ComboBox('organizacao_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Budokai SÃ£o Paulo', 'Budokai SÃ£o Paulo');
            $editor->addChoice('Do Kyokushin Lavras', 'Do Kyokushin Lavras');
            $editor->addChoice('FK Combate Guarulhos', 'FK Combate Guarulhos');
            $editor->addChoice('Heikokai ABC', 'Heikokai ABC');
            $editor->addChoice('Heikokai Santo AndrÃ©', 'Heikokai Santo AndrÃ©');
            $editor->addChoice('Seishin Kyokushin Cajamar', 'Seishin Kyokushin Cajamar');
            $editor->addChoice('Senshikai Ipero', 'Senshikai Ipero');
            $editor->addChoice('Shidokan Heliopolis', 'Shidokan Heliopolis');
            $editor->addChoice('Shidokan Santo AndrÃ©', 'Shidokan Santo AndrÃ©');
            $editor->addChoice('So Kyokushin Caraguatatuba', 'So Kyokushin Caraguatatuba');
            $editor->addChoice('So Kyokushin TaubatÃ©', 'So Kyokushin TaubatÃ©');
            $editor->addChoice('Sonoda Group Sorocaba', 'Sonoda Group Sorocaba');
            $editor->addChoice('Toeikan EmbÃº das Artes', 'Toeikan EmbÃº das Artes');
            $editor->addChoice('Toeikan Mogi/Suzano', 'Toeikan Mogi/Suzano');
            $editor->addChoice('Toeikan SÃ£o Paulo', 'Toeikan SÃ£o Paulo');
            $editor->addChoice('Outra', 'Outra');
            $editColumn = new CustomEditColumn('Organizacao', 'organizacao', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for graduacao field
            //
            $editor = new ComboBox('graduacao_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Branca', 'Branca');
            $editor->addChoice('Laranja', 'Laranja');
            $editor->addChoice('Azul', 'Azul');
            $editor->addChoice('Amarela', 'Amarela');
            $editor->addChoice('Verde', 'Verde');
            $editor->addChoice('Marrom', 'Marrom');
            $editor->addChoice('Preta 1 DAN', 'Preta 1 DAN');
            $editor->addChoice('Preta 2 DAN', 'Preta 2 DAN');
            $editor->addChoice('Preta 3 DAN', 'Preta 3 DAN');
            $editor->addChoice('Preta 4 DAN', 'Preta 4 DAN');
            $editor->addChoice('Preta 5 DAN', 'Preta 5 DAN');
            $editor->addChoice('Preta 6 DAN', 'Preta 6 DAN');
            $editor->addChoice('Preta 7 DAN', 'Preta 7 DAN');
            $editor->addChoice('Preta 8 DAN', 'Preta 8 DAN');
            $editor->addChoice('Preta 9 DAN', 'Preta 9 DAN');
            $editColumn = new CustomEditColumn('Graduacao', 'graduacao', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for endereco field
            //
            $editor = new TextEdit('endereco_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Endereco', 'endereco', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for cep field
            //
            $editor = new TextEdit('cep_edit');
            $editor->SetMaxLength(9);
            $editColumn = new CustomEditColumn('Cep', 'cep', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for cidade field
            //
            $editor = new TextEdit('cidade_edit');
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Cidade', 'cidade', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for whatsapp field
            //
            $editor = new TextEdit('whatsapp_edit');
            $editor->SetMaxLength(15);
            $editColumn = new CustomEditColumn('Whatsapp', 'whatsapp', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for email field
            //
            $editor = new TextEdit('email_edit');
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Email', 'email', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for regCBKI field
            //
            $editor = new TextEdit('regcbki_edit');
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Reg CBKI', 'regCBKI', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for cursoarb1 field
            //
            $editor = new ComboBox('cursoarb1_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Sim', 'Sim');
            $editor->addChoice('Nao', 'Nao');
            $editColumn = new CustomEditColumn('Cursoarb1', 'cursoarb1', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for cursoarb2 field
            //
            $editor = new ComboBox('cursoarb2_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Sim', 'Sim');
            $editor->addChoice('Nao', 'Nao');
            $editColumn = new CustomEditColumn('Cursoarb2', 'cursoarb2', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for justificativa field
            //
            $editor = new TextEdit('justificativa_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Justificativa', 'justificativa', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for atuacao field
            //
            $editor = new ComboBox('atuacao_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Central', 'Central');
            $editor->addChoice('Lateral', 'Lateral');
            $editor->addChoice('Mesario', 'Mesario');
            $editor->addChoice('Staff', 'Staff');
            $editColumn = new CustomEditColumn('Atuacao', 'atuacao', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddMultiEditColumns(Grid $grid)
        {
            //
            // Edit column for nome field
            //
            $editor = new TextEdit('nome_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Nome', 'nome', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for organizacao field
            //
            $editor = new ComboBox('organizacao_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Budokai SÃ£o Paulo', 'Budokai SÃ£o Paulo');
            $editor->addChoice('Do Kyokushin Lavras', 'Do Kyokushin Lavras');
            $editor->addChoice('FK Combate Guarulhos', 'FK Combate Guarulhos');
            $editor->addChoice('Heikokai ABC', 'Heikokai ABC');
            $editor->addChoice('Heikokai Santo AndrÃ©', 'Heikokai Santo AndrÃ©');
            $editor->addChoice('Seishin Kyokushin Cajamar', 'Seishin Kyokushin Cajamar');
            $editor->addChoice('Senshikai Ipero', 'Senshikai Ipero');
            $editor->addChoice('Shidokan Heliopolis', 'Shidokan Heliopolis');
            $editor->addChoice('Shidokan Santo AndrÃ©', 'Shidokan Santo AndrÃ©');
            $editor->addChoice('So Kyokushin Caraguatatuba', 'So Kyokushin Caraguatatuba');
            $editor->addChoice('So Kyokushin TaubatÃ©', 'So Kyokushin TaubatÃ©');
            $editor->addChoice('Sonoda Group Sorocaba', 'Sonoda Group Sorocaba');
            $editor->addChoice('Toeikan EmbÃº das Artes', 'Toeikan EmbÃº das Artes');
            $editor->addChoice('Toeikan Mogi/Suzano', 'Toeikan Mogi/Suzano');
            $editor->addChoice('Toeikan SÃ£o Paulo', 'Toeikan SÃ£o Paulo');
            $editor->addChoice('Outra', 'Outra');
            $editColumn = new CustomEditColumn('Organizacao', 'organizacao', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for graduacao field
            //
            $editor = new ComboBox('graduacao_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Branca', 'Branca');
            $editor->addChoice('Laranja', 'Laranja');
            $editor->addChoice('Azul', 'Azul');
            $editor->addChoice('Amarela', 'Amarela');
            $editor->addChoice('Verde', 'Verde');
            $editor->addChoice('Marrom', 'Marrom');
            $editor->addChoice('Preta 1 DAN', 'Preta 1 DAN');
            $editor->addChoice('Preta 2 DAN', 'Preta 2 DAN');
            $editor->addChoice('Preta 3 DAN', 'Preta 3 DAN');
            $editor->addChoice('Preta 4 DAN', 'Preta 4 DAN');
            $editor->addChoice('Preta 5 DAN', 'Preta 5 DAN');
            $editor->addChoice('Preta 6 DAN', 'Preta 6 DAN');
            $editor->addChoice('Preta 7 DAN', 'Preta 7 DAN');
            $editor->addChoice('Preta 8 DAN', 'Preta 8 DAN');
            $editor->addChoice('Preta 9 DAN', 'Preta 9 DAN');
            $editColumn = new CustomEditColumn('Graduacao', 'graduacao', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for endereco field
            //
            $editor = new TextEdit('endereco_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Endereco', 'endereco', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for cep field
            //
            $editor = new TextEdit('cep_edit');
            $editor->SetMaxLength(9);
            $editColumn = new CustomEditColumn('Cep', 'cep', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for cidade field
            //
            $editor = new TextEdit('cidade_edit');
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Cidade', 'cidade', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for whatsapp field
            //
            $editor = new TextEdit('whatsapp_edit');
            $editor->SetMaxLength(15);
            $editColumn = new CustomEditColumn('Whatsapp', 'whatsapp', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for email field
            //
            $editor = new TextEdit('email_edit');
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Email', 'email', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for regCBKI field
            //
            $editor = new TextEdit('regcbki_edit');
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Reg CBKI', 'regCBKI', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for cursoarb1 field
            //
            $editor = new ComboBox('cursoarb1_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Sim', 'Sim');
            $editor->addChoice('Nao', 'Nao');
            $editColumn = new CustomEditColumn('Cursoarb1', 'cursoarb1', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for cursoarb2 field
            //
            $editor = new ComboBox('cursoarb2_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Sim', 'Sim');
            $editor->addChoice('Nao', 'Nao');
            $editColumn = new CustomEditColumn('Cursoarb2', 'cursoarb2', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for justificativa field
            //
            $editor = new TextEdit('justificativa_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Justificativa', 'justificativa', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for atuacao field
            //
            $editor = new ComboBox('atuacao_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Central', 'Central');
            $editor->addChoice('Lateral', 'Lateral');
            $editor->addChoice('Mesario', 'Mesario');
            $editor->addChoice('Staff', 'Staff');
            $editColumn = new CustomEditColumn('Atuacao', 'atuacao', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for nome field
            //
            $editor = new TextEdit('nome_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Nome', 'nome', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for organizacao field
            //
            $editor = new ComboBox('organizacao_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Budokai SÃ£o Paulo', 'Budokai SÃ£o Paulo');
            $editor->addChoice('Do Kyokushin Lavras', 'Do Kyokushin Lavras');
            $editor->addChoice('FK Combate Guarulhos', 'FK Combate Guarulhos');
            $editor->addChoice('Heikokai ABC', 'Heikokai ABC');
            $editor->addChoice('Heikokai Santo AndrÃ©', 'Heikokai Santo AndrÃ©');
            $editor->addChoice('Seishin Kyokushin Cajamar', 'Seishin Kyokushin Cajamar');
            $editor->addChoice('Senshikai Ipero', 'Senshikai Ipero');
            $editor->addChoice('Shidokan Heliopolis', 'Shidokan Heliopolis');
            $editor->addChoice('Shidokan Santo AndrÃ©', 'Shidokan Santo AndrÃ©');
            $editor->addChoice('So Kyokushin Caraguatatuba', 'So Kyokushin Caraguatatuba');
            $editor->addChoice('So Kyokushin TaubatÃ©', 'So Kyokushin TaubatÃ©');
            $editor->addChoice('Sonoda Group Sorocaba', 'Sonoda Group Sorocaba');
            $editor->addChoice('Toeikan EmbÃº das Artes', 'Toeikan EmbÃº das Artes');
            $editor->addChoice('Toeikan Mogi/Suzano', 'Toeikan Mogi/Suzano');
            $editor->addChoice('Toeikan SÃ£o Paulo', 'Toeikan SÃ£o Paulo');
            $editor->addChoice('Outra', 'Outra');
            $editColumn = new CustomEditColumn('Organizacao', 'organizacao', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for graduacao field
            //
            $editor = new ComboBox('graduacao_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Branca', 'Branca');
            $editor->addChoice('Laranja', 'Laranja');
            $editor->addChoice('Azul', 'Azul');
            $editor->addChoice('Amarela', 'Amarela');
            $editor->addChoice('Verde', 'Verde');
            $editor->addChoice('Marrom', 'Marrom');
            $editor->addChoice('Preta 1 DAN', 'Preta 1 DAN');
            $editor->addChoice('Preta 2 DAN', 'Preta 2 DAN');
            $editor->addChoice('Preta 3 DAN', 'Preta 3 DAN');
            $editor->addChoice('Preta 4 DAN', 'Preta 4 DAN');
            $editor->addChoice('Preta 5 DAN', 'Preta 5 DAN');
            $editor->addChoice('Preta 6 DAN', 'Preta 6 DAN');
            $editor->addChoice('Preta 7 DAN', 'Preta 7 DAN');
            $editor->addChoice('Preta 8 DAN', 'Preta 8 DAN');
            $editor->addChoice('Preta 9 DAN', 'Preta 9 DAN');
            $editColumn = new CustomEditColumn('Graduacao', 'graduacao', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for endereco field
            //
            $editor = new TextEdit('endereco_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Endereco', 'endereco', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for cep field
            //
            $editor = new TextEdit('cep_edit');
            $editor->SetMaxLength(9);
            $editColumn = new CustomEditColumn('Cep', 'cep', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for cidade field
            //
            $editor = new TextEdit('cidade_edit');
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Cidade', 'cidade', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for whatsapp field
            //
            $editor = new TextEdit('whatsapp_edit');
            $editor->SetMaxLength(15);
            $editColumn = new CustomEditColumn('Whatsapp', 'whatsapp', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for email field
            //
            $editor = new TextEdit('email_edit');
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Email', 'email', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for regCBKI field
            //
            $editor = new TextEdit('regcbki_edit');
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Reg CBKI', 'regCBKI', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for cursoarb1 field
            //
            $editor = new ComboBox('cursoarb1_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Sim', 'Sim');
            $editor->addChoice('Nao', 'Nao');
            $editColumn = new CustomEditColumn('Cursoarb1', 'cursoarb1', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for cursoarb2 field
            //
            $editor = new ComboBox('cursoarb2_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Sim', 'Sim');
            $editor->addChoice('Nao', 'Nao');
            $editColumn = new CustomEditColumn('Cursoarb2', 'cursoarb2', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for justificativa field
            //
            $editor = new TextEdit('justificativa_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Justificativa', 'justificativa', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for atuacao field
            //
            $editor = new ComboBox('atuacao_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Central', 'Central');
            $editor->addChoice('Lateral', 'Lateral');
            $editor->addChoice('Mesario', 'Mesario');
            $editor->addChoice('Staff', 'Staff');
            $editColumn = new CustomEditColumn('Atuacao', 'atuacao', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            $grid->SetShowAddButton(false && $this->GetSecurityInfo()->HasAddGrant());
        }
    
        private function AddMultiUploadColumn(Grid $grid)
        {
    
        }
    
        protected function AddPrintColumns(Grid $grid)
        {
            //
            // View column for ID field
            //
            $column = new NumberViewColumn('ID', 'ID', 'ID', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for nome field
            //
            $column = new TextViewColumn('nome', 'nome', 'Nome', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for organizacao field
            //
            $column = new TextViewColumn('organizacao', 'organizacao', 'Organizacao', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for graduacao field
            //
            $column = new TextViewColumn('graduacao', 'graduacao', 'Graduacao', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for endereco field
            //
            $column = new TextViewColumn('endereco', 'endereco', 'Endereco', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for cep field
            //
            $column = new TextViewColumn('cep', 'cep', 'Cep', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for cidade field
            //
            $column = new TextViewColumn('cidade', 'cidade', 'Cidade', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for whatsapp field
            //
            $column = new TextViewColumn('whatsapp', 'whatsapp', 'Whatsapp', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for email field
            //
            $column = new TextViewColumn('email', 'email', 'Email', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for regCBKI field
            //
            $column = new TextViewColumn('regCBKI', 'regCBKI', 'Reg CBKI', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for cursoarb1 field
            //
            $column = new TextViewColumn('cursoarb1', 'cursoarb1', 'Cursoarb1', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for cursoarb2 field
            //
            $column = new TextViewColumn('cursoarb2', 'cursoarb2', 'Cursoarb2', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for justificativa field
            //
            $column = new TextViewColumn('justificativa', 'justificativa', 'Justificativa', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for atuacao field
            //
            $column = new TextViewColumn('atuacao', 'atuacao', 'Atuacao', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for ID field
            //
            $column = new NumberViewColumn('ID', 'ID', 'ID', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for nome field
            //
            $column = new TextViewColumn('nome', 'nome', 'Nome', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for organizacao field
            //
            $column = new TextViewColumn('organizacao', 'organizacao', 'Organizacao', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for graduacao field
            //
            $column = new TextViewColumn('graduacao', 'graduacao', 'Graduacao', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for endereco field
            //
            $column = new TextViewColumn('endereco', 'endereco', 'Endereco', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for cep field
            //
            $column = new TextViewColumn('cep', 'cep', 'Cep', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for cidade field
            //
            $column = new TextViewColumn('cidade', 'cidade', 'Cidade', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for whatsapp field
            //
            $column = new TextViewColumn('whatsapp', 'whatsapp', 'Whatsapp', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for email field
            //
            $column = new TextViewColumn('email', 'email', 'Email', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for regCBKI field
            //
            $column = new TextViewColumn('regCBKI', 'regCBKI', 'Reg CBKI', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for cursoarb1 field
            //
            $column = new TextViewColumn('cursoarb1', 'cursoarb1', 'Cursoarb1', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for cursoarb2 field
            //
            $column = new TextViewColumn('cursoarb2', 'cursoarb2', 'Cursoarb2', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for justificativa field
            //
            $column = new TextViewColumn('justificativa', 'justificativa', 'Justificativa', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for atuacao field
            //
            $column = new TextViewColumn('atuacao', 'atuacao', 'Atuacao', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
        }
    
        private function AddCompareColumns(Grid $grid)
        {
            //
            // View column for nome field
            //
            $column = new TextViewColumn('nome', 'nome', 'Nome', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for organizacao field
            //
            $column = new TextViewColumn('organizacao', 'organizacao', 'Organizacao', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for graduacao field
            //
            $column = new TextViewColumn('graduacao', 'graduacao', 'Graduacao', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for endereco field
            //
            $column = new TextViewColumn('endereco', 'endereco', 'Endereco', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for cep field
            //
            $column = new TextViewColumn('cep', 'cep', 'Cep', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for cidade field
            //
            $column = new TextViewColumn('cidade', 'cidade', 'Cidade', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for whatsapp field
            //
            $column = new TextViewColumn('whatsapp', 'whatsapp', 'Whatsapp', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for email field
            //
            $column = new TextViewColumn('email', 'email', 'Email', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for regCBKI field
            //
            $column = new TextViewColumn('regCBKI', 'regCBKI', 'Reg CBKI', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for cursoarb1 field
            //
            $column = new TextViewColumn('cursoarb1', 'cursoarb1', 'Cursoarb1', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for cursoarb2 field
            //
            $column = new TextViewColumn('cursoarb2', 'cursoarb2', 'Cursoarb2', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for justificativa field
            //
            $column = new TextViewColumn('justificativa', 'justificativa', 'Justificativa', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for atuacao field
            //
            $column = new TextViewColumn('atuacao', 'atuacao', 'Atuacao', $this->dataset);
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
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset);
            if ($this->GetSecurityInfo()->HasDeleteGrant())
               $result->SetAllowDeleteSelected(false);
            else
               $result->SetAllowDeleteSelected(false);   
            
            ApplyCommonPageSettings($this, $result);
            
            $result->SetUseImagesForActions(true);
            $result->SetUseFixedHeader(false);
            $result->SetShowLineNumbers(false);
            $result->SetShowKeyColumnsImagesInHeader(false);
            $result->setAllowSortingByClick(false);
            $result->setAllowSortingByDialog(false);
            $result->SetViewMode(ViewMode::TABLE);
            $result->setEnableRuntimeCustomization(false);
            $result->SetShowUpdateLink(false);
            $result->setSelectionFilterAllowed(false);
            $result->setMultiEditAllowed($this->GetSecurityInfo()->HasEditGrant() && false);
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
            $this->SetShowTopPageNavigator(false);
            $this->SetShowBottomPageNavigator(false);
            $this->setPrintListAvailable(false);
            $this->setPrintListRecordAvailable(false);
            $this->setPrintOneRecordAvailable(false);
            $this->setAllowPrintSelectedRecords(false);
            $this->setOpenPrintFormInNewTab(false);
            $this->setExportListAvailable(array());
            $this->setExportSelectedRecordsAvailable(array());
            $this->setExportListRecordAvailable(array());
            $this->setExportOneRecordAvailable(array());
            $this->setOpenExportedPdfInNewTab(false);
            $this->setShowFormErrorsOnTop(true);
    
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
        $Page = new staffPage("staff", "staff.php", GetCurrentUserPermissionsForPage("staff"), 'UTF-8');
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("staff"));
        GetApplication()->SetMainPage($Page);
        GetApplication()->Run();
    }
    catch(Exception $e)
    {
        ShowErrorPage($e);
    }
	
