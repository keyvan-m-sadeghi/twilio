<?php

class erLhcoreClassTwilioValidator
{
    public static function validatePhone(erLhcoreClassModelTwilioPhone & $item)
    {
            $definition = array(
                'phone' => new ezcInputFormDefinitionElement(
                    ezcInputFormDefinitionElement::OPTIONAL, 'unsafe_raw'
                ),
                'account_sid' => new ezcInputFormDefinitionElement(
                    ezcInputFormDefinitionElement::OPTIONAL, 'unsafe_raw'
                ),
                'auth_token' => new ezcInputFormDefinitionElement(
                    ezcInputFormDefinitionElement::OPTIONAL, 'unsafe_raw'
                ),
                'chat_timeout' => new ezcInputFormDefinitionElement(
                    ezcInputFormDefinitionElement::OPTIONAL, 'unsafe_raw'
                ),
                'originator' => new ezcInputFormDefinitionElement(
                    ezcInputFormDefinitionElement::OPTIONAL, 'unsafe_raw'
                ),
                'dep_id' => new ezcInputFormDefinitionElement(
                    ezcInputFormDefinitionElement::OPTIONAL, 'int', array('min_range' => 1)
                )
            );

            $form = new ezcInputForm( INPUT_POST, $definition );
            $Errors = array();
            
            if ( $form->hasValidData( 'phone' ) && $form->phone != '')
            {
                $item->phone = $form->phone;
            } else {
                $Errors[] =  erTranslationClassLhTranslation::getInstance()->getTranslation('xmppservice/operatorvalidator','Please enter phone number!');
            }
            
            if ( $form->hasValidData( 'account_sid' ) && $form->account_sid != '')
            {
                $item->account_sid = $form->account_sid;
            } else {
                $Errors[] =  erTranslationClassLhTranslation::getInstance()->getTranslation('xmppservice/operatorvalidator','Please enter Account SID!');
            }

            if ( $form->hasValidData( 'auth_token' ) && $form->auth_token != '')
            {
                $item->auth_token = $form->auth_token;
            } else {
                $Errors[] =  erTranslationClassLhTranslation::getInstance()->getTranslation('xmppservice/operatorvalidator','Please enter Auth Token!');
            }
            
            if ( $form->hasValidData( 'originator' ) && $form->originator != '')
            {
                $item->originator = $form->originator;
            } else {
                $item->originator = '';
            }
            
            if ( $form->hasValidData( 'dep_id' ))
            {
                $item->dep_id = $form->dep_id;
            } else {
                $Errors[] =  erTranslationClassLhTranslation::getInstance()->getTranslation('xmppservice/operatorvalidator','Please choose a department!');
            }
            
            if ( $form->hasValidData( 'chat_timeout' ))
            {
                $item->chat_timeout = $form->chat_timeout;
            } else {
                $Errors[] =  erTranslationClassLhTranslation::getInstance()->getTranslation('xmppservice/operatorvalidator','Please enter chat timeout!');
            }
            
            return $Errors;        
    }
    
}