# Usage #

## Model ##
You may use the default model provided by this bundle. But for each model an interface is available to use your own logical.

  - PadInterface
    - Pad
  - GroupInterface
    - Group
  - SessionInterface
    - Session
  - AuthorInterface
    - Author

## Provider ##
The provider is the Symfony representation of the Etherpad-lite [API](https://github.com/ether/etherpad-lite/wiki/HTTP-API). Each API calling is a provider function.

All providers are registered in the DIC with the name:

  - imag_etherpad.pad_provider
  - imag_etherpad.pads_provider
  - imag_etherpad.group_provider
  - imag_etherpad.groups_provider
  - imag_etherpad.session_provider
  - imag_etherpad.author_provider
  
The provider function in the most cases need a model interface in first argument.


```php
class PadProvider extends AbstractProvider
{
    public function createPad(PadInterface $pad)
    
    public function setPublicStatus(PadInterface $pad, $bool)

```

## Examples ##

It's really easy to integrate this bundle to your infrastructure


### Create a new Pad ###

```php
<?php
namespace IMAG\FrontEtherpadBundle\Controller;

/**
 * @Route("/pad", name="pad_create")
 * @method("POST")
 * @Template("IMAGFrontEtherpadBundle:Pad:new.html.twig")
 */
public function createAction(Request $request)
{
    $groupProvider = $this->get('imag_etherpad.group_provider');

    $form = $this->createForm(new PadType($this->getUser()));

    $form->handleRequest($request);

    if ($form->isValid()) {
        $pad = $form->getData();
        $groupProvider->createGroupIfNotExistsFor($pad->getGroup());

        try {
            $groupProvider->createGroupPad($pad->getGroup(), $pad);

        } catch (\IMAG\EtherpadBundle\Exception\InvalidArgumentException $e) {
            $this->get('session')->getFlashBag()->add('danger', 'pad.create.name_exists');

            return $this->redirect($this->generateUrl('pad_new'));

        }

        if (null !== $dispatcher = $this->get('event_dispatcher')) {
            $event = new PadEvent($pad);
            $dispatcher->dispatch(FrontEtherpadEvents::PAD_CREATED, $event);
        }

        $this->get('session')->getFlashBag()->add('success', 'pad.create.success');

        return $this->redirect($this->generateUrl('user_pads'));
    }

    return array(
        'form' => $form->createView(),
    );
}
```

### Extends your model to use this Bundle ###

```php
<?php

namespace IMAG\FrontEtherpadBundle\Entity;

/**
 * @ORM\Entity(repositoryClass="IMAG\FrontEtherpadBundle\Repository\UnitRepository")
 * @ORM\Table(name="Unit")
 * @UniqueEntity(fields={"name"}, message="unit.name.unique")
 * @ORM\HasLifecycleCallbacks
 */
class Unit implements GroupInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Assert\Type("integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Assert\Type("string")
     * @Assert\NotBlank(message="unit.name.not_blank")
     */
    private $name;

    /**
     * @Assert\Type("object")
     */
    protected $pads;

    public function __construct()
    {
        $this->pads = new \IMAG\EtherpadBundle\Model\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set etherpadId
     * @return \IMAG\FrontEtherpadBundle\Entity\Unit
     */
    public function setEtherpadId($id)
    {
        $this->etherpadId = $id;
        
        return $this;
    }

    /**
     * Get etherpadId
     *
     * @return string
     */
    public function getEtherpadId()
    {
        return $this->etherpadId;
    }

    public function addPad(Pad $pad)
    {
        if (null === $this->pads) {
            $this->pads = new \IMAG\EtherpadBundle\Model\ArrayCollection();
        }
        
        $this->pads[$pad->getEtherpadId()] = $pad;

        return $this;
    }

    public function getPads()
    {
        return $this->pads ? $this->pads : array();;
    }

}
```
