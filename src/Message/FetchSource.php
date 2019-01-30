<?php

/**
 * Stripe Fetch Charge Request.
 */
namespace Omnipay\Stripe\Message;

/**
 * Stripe Fetch Source.
 *
 * @see \Omnipay\Stripe\Message\FetchTransactionReques
 * @link https://stripe.com/docs/api/sources/retrieve
 */
class FetchSource extends AbstractRequest
{
    /**
     * Get the source reference.
     *
     * @return string
     */
    public function getSource()
    {
        return $this->getParameter('source');
    }

    /**
     * Set the source reference.
     *
     * @param string
     * @return FetchSource provides a fluent interface.
     */
    public function setSource($source)
    {
        return $this->setParameter('source', $source);
    }

    public function getData()
    {
        $this->validate('source');
    }

    public function getEndpoint()
    {
        return $this->endpoint.'/sources/'.$this->getSource();
    }

    public function getHttpMethod()
    {
        return 'GET';
    }
}
