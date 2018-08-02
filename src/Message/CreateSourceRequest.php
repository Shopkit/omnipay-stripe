<?php

/**
 * Stripe Create Source Request.
 */
namespace Omnipay\Stripe\Message;

/**
 * Stripe Create Source Request
 *
 * @see Omnipay\Stripe\Gateway
 * @link https://stripe.com/docs/api#create_source
 */
class CreateSourceRequest extends AbstractRequest
{
    /**
     * @return mixed
     */
    public function getOwner()
    {
        return $this->getParameter('owner');
    }

    /**
     * @param $value
     *
     * @return AbstractRequest provides a fluent interface.
     */
    public function setOwner($owner)
    {
        return $this->setParameter('owner', $owner);
    }

    /**
     * Set the source amount
     *
     * @return CreateSourceRequest provides a fluent interface.
     */
    public function setAmount($amount)
    {
        return $this->setParameter('amount', $amount);
    }

    /**
     * Get the source amount
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->getParameter('amount');
    }


    /**
     * Set the source type
     *
     * @return CreateSourceRequest provides a fluent interface.
     */
    public function setType($type)
    {
        return $this->setParameter('type', $type);
    }

    /**
     * Get the source type
     *
     * @return int
     */
    public function getType()
    {
        return $this->getParameter('type');
    }

    /**
     * Set the source redirect
     *
     * @return CreateSourceRequest provides a fluent interface.
     */
    public function setRedirect($redirect)
    {
        return $this->setParameter('redirect', $redirect);
    }

    /**
     * Get the source redirect
     *
     * @return string
     */
    public function getRedirect()
    {
        return $this->getParameter('redirect');
    }

    public function getData()
    {
        $this->validate('type', 'amount', 'currency');

        $data = array(
            'type' => $this->getType(),
            'amount' => $this->getAmount(),
            'currency' => $this->getCurrency(),
        );

        if ($this->getOwner()) {
            $data['owner'] = $this->getOwner();
        }

        if ($this->getRedirect()) {
            $data['redirect'] = $this->getRedirect();
        }

        if ($this->getMetadata()) {
            $data['metadata'] = $this->getMetadata();
        }

        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint.'/sources';
    }
}
