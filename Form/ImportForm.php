<?php

namespace ColissimoPickupPoint\Form;

use ColissimoPickupPoint\ColissimoPickupPoint;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints;
use Thelia\Core\Translation\Translator;
use Thelia\Form\BaseForm;

/**
 * Class ImportForm
 * @package ColissimoPickupPoint\Form
 * @author Etienne Perriere - OpenStudio <eperriere@openstudio.fr>
 */
class ImportForm extends BaseForm
{
    public static function getName()
    {
        return 'colissimopickuppoint_import_form';
    }

    protected function buildForm()
    {
        $this->formBuilder
            ->add(
                'import_file', FileType::class,
                [
                    'label' => Translator::getInstance()->trans('Select file to import', [], ColissimoPickupPoint::DOMAIN),
                    'constraints' => [
                        new Constraints\NotBlank(),
                        new Constraints\File(['mimeTypes' => ['text/csv', 'text/plain']])
                    ],
                    'label_attr' => ['for' => 'import_file']
                ]
            );
    }
}
