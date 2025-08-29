<?php
/**
 * Override do formulário de contato com acessibilidade, ARIA e i18n
 * Local: templates/seu_template/html/com_contact/contact/default_form.php
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

?>
<div class="contact-form" role="form" aria-labelledby="contactFormTitle">
    <h2 id="contactFormTitle">
        <?php echo Text::_('COM_CONTACT_FORM_LABEL'); ?>
    </h2>

    <form action="<?php echo Route::_('index.php'); ?>" method="post" id="contact-form" class="form-validate" novalidate aria-describedby="formHelp">
        
        <p id="formHelp" class="visually-hidden">
            <?php echo Text::_('COM_CONTACT_FORM_HELP_TEXT'); ?>
        </p>

        <!-- Nome -->
        <div class="form-group">
            <label for="jform_contact_name">
                <?php echo Text::_('COM_CONTACT_CONTACT_EMAIL_NAME_LABEL'); ?>
            </label>
            <input type="text" name="jform[contact_name]" id="jform_contact_name" class="form-control" required aria-required="true">
        </div>

        <!-- E-mail -->
        <div class="form-group">
            <label for="jform_contact_email">
                <?php echo Text::_('COM_CONTACT_CONTACT_EMAIL_EMAIL_LABEL'); ?>
            </label>
            <input type="email" name="jform[contact_email]" id="jform_contact_email" class="form-control" required aria-required="true">
        </div>

        <!-- Assunto -->
        <div class="form-group">
            <label for="jform_contact_subject">
                <?php echo Text::_('COM_CONTACT_CONTACT_EMAIL_SUBJECT_LABEL'); ?>
            </label>
            <input type="text" name="jform[contact_subject]" id="jform_contact_subject" class="form-control" required aria-required="true">
        </div>

        <!-- Mensagem -->
        <div class="form-group">
            <label for="jform_contact_message">
                <?php echo Text::_('COM_CONTACT_CONTACT_MESSAGE_LABEL'); ?>
            </label>
            <textarea name="jform[contact_message]" id="jform_contact_message" class="form-control" rows="6" required aria-required="true"></textarea>
        </div>

        <!-- Captcha (se ativo) -->
        <?php if ($this->captcha) : ?>
            <div class="form-group" role="group" aria-label="<?php echo Text::_('COM_CONTACT_CAPTCHA_LABEL'); ?>">
                <?php echo $this->captcha; ?>
            </div>
        <?php endif; ?>

        <!-- Botão enviar -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                <?php echo Text::_('COM_CONTACT_CONTACT_SEND'); ?>
            </button>
        </div>

        <?php echo $this->form->getInput('id'); ?>
        <input type="hidden" name="option" value="com_contact">
        <input type="hidden" name="task" value="contact.submit">
        <?php echo JHtml::_('form.token'); ?>
    </form>
</div>
