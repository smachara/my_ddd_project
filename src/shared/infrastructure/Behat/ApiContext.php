<?php

declare(strict_types = 1);

namespace MacharaM\Shared\Infrastructure\Behat;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\MinkExtension\Context\MinkContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;

final class ApiContext extends MinkContext implements Context
{
    private ?Response $response;

    public function __construct(private KernelInterface $kernel)
    {}

    /**
     * @Given I send a :method request to :url
     */
    public function iSendARequestTo($method, $url): void
    {
        $this->response = $this->kernel->handle(Request::create($url, $method));
    }

    /**
     * @Given I send a :method request to :url with body:
     */
    public function iSendARequestToWithBody($method, $url, PyStringNode $body): void
    {
       $this->response = $this->kernel->handle(Request::create($url, $method, content:$body->getRaw()));
        // $this->request->sendRequestWithPyStringNode($method, $this->locatePath($url), $body);
    }

    /**
     * @Then the response content should be:
     */
    public function theResponseContentShouldBe(PyStringNode $expectedResponse): void
    {
        $expected = $this->sanitizeOutput($expectedResponse->getRaw());
        $actual   = $this->sanitizeOutput($this->response->getContent());
        if ($expected !== $actual) {
            throw new \RuntimeException(
                sprintf("The outputs does not match!\n\n-- Expected:\n%s\n\n-- Actual:\n%s", $expected, $actual)
            );
        }
    }

    /**
     * @Then the response status code should be :expectedResponseCode
     */
    public function theResponseStatusCodeShouldBe($expectedResponseCode): void
    {
        $actual   = (string) $this->response->getStatusCode();


        assert($expectedResponseCode === $actual);

        if ($expectedResponseCode !== $actual) {
            throw new \RuntimeException(
                sprintf(
                    "The status code does not match!\n\n-- Expected:\n%s\n\n-- Actual:\n%s", 
                    $expectedResponseCode, 
                    $actual)
            );
        }
    }

    /**
     * @Then the response should be empty
     */
    public function theResponseShouldBeEmpty(): void
    {
        $actual   = trim($this->response->getContent());

        if (!empty($actual)) {
            throw new \RuntimeException(
                sprintf("The outputs is not empty, Actual:\n%s", $actual)
            );
        }
    }

    /**
     * @Then print last api response
     */
    public function printApiResponse(): void
    {
        print_r($this->response);
    }

    /**
     * @Then print response headers
     */
    public function printResponseHeaders(): void
    {
        print_r($this->response->headers);
    }

    private function sanitizeOutput(string $output)
    {
        return json_encode(json_decode(trim($output), true));
    }
}
