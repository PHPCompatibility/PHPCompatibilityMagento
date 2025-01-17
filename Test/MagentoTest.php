<?php
/*
 * Test file to run PHP_CodeSniffer against to make sure the polyfills are correctly excluded.
 *
 * This file should only test the polyfills provided by Magento itself.
 * The polyfills provided via dependencies will be tested via the repo containing
 * the dedicated ruleset(s) for those dependencies.
 */

// TODO: add a test for each polyfilled feature (violations for which are excluded via the ruleset).

// Magento's template syntax uses <% and %> as a delimiter. These should not be confused with ASP open/close tags.
// @see https://github.com/magento/magento2/blob/2.4.6/app/code/Magento/ConfigurableProduct/view/adminhtml/templates/catalog/product/edit/attribute/steps/bulk.phtml#L108-L109
?>
<script data-template="test" type="text/x-magento-template">
  <div id="<%- data.id %>" class="file-row">
  </div>
</script>
