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

    /**
     * Set the source usage
     *
     * @return CreateSourceRequest provides a fluent interface.
     */
    public function setUsage($usage)
    {
        return $this->setParameter('usage', $usage);
    }

    /**
     * Get the source usage
     *
     * @return string
     */
    public function getUsage()
    {
        return $this->getParameter('usage');
    }

    /**
     * Get the source card
     *
     * @return string
     */
    public function getSource()
    {
        return $this->getParameter('source');
    }

    /**
     * Get the token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->getParameter('token');
    }

    public function getData()
    {
        $this->validate('type', 'amount', 'currency');

        $data = array(
            'type' => $this->getType(),
            'amount' => $this->getAmount(),
            'currency' => $this->getCurrency(),
        );

        if ($this->getType() == 'three_d_secure') {
            $data['three_d_secure'] = array(
                'card' => $this->getSource(),
            );
        }

        if ($this->getUsage()) {
            $data['usage'] = $this->getUsage();
        }

        if ($this->getType() == 'card') {
            $data['token'] = $this->getToken();
        }

        if ($this->getOwner()) {
            $data['owner'] = $this->getOwner();
        }

        if ($this->getMetadata()) {
            $data['metadata'] = $this->getMetadata();
        }

        if ($this->getRedirect()) {
            $data['redirect'] = $this->getRedirect();
        }

        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint.'/sources';
    }
}
