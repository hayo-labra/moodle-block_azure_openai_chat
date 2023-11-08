# moodle-block_azure_openai_chat

This plugin is modified version of [Bryce Yoder](https://bryceyoder.com)'s plugin which uses OpenAI's GPT API.  

### Azure OpenAI Services powered AI chat block for Moodle

This block allows your Moodle users to get 24/7 chat support via Azure OpenAI Services AI. The block offers multiple options for customizing the persona of the AI and the prompt it is given, in order to influence the text it outputs. 

This plugin supports only the [Chat Completions API](https://learn.microsoft.com/en-us/azure/ai-services/openai/reference#chat-completions) via [API Key authentication](https://learn.microsoft.com/en-us/azure/ai-services/openai/reference#authentication).

## Global block settings

The global block settings can be found by going to Site Administration > Plugins > Blocks > Azure OpenAI Chat Block. The options are:
-  **Restrict chat usage to logged-in users:** If this box is checked, only logged-in users will be able to use the chat box.
-  **Endpoint:** The endpoint address for your Azure OpenAI Services.
-  **API Key:** The API Key for your Azure OpenAI Services.
-  **Deployment id:** The name of your model deployment.
-  **Completion prompt:** Here you can edit the text added to the top of the conversation in order to influence the AI's persona and responses.
-  **Assistant name:** This is the name that the AI will use for itself in the conversation.
-  **User name:** This is the name that will be used for the User in the conversation. Both this and the above option can be used to influence the persona and responses of the AI.
-  **Source of truth:** Here you can add a list of questions and answers that the AI will use to accurately respond to queries. Anything added here in the SoT at the plugin level will be applied to every block instance on the site.
There is also an "Advanced" section that allows a user to fine-tune the AI's parameters. Please see OpenAI's documentation for more information on these options.

## Individual block settings

There are a few settings that can be changed on a per-block basis. You can access these settings by entering editing mode on your site and clicking the gear on the block, and then going to "Configure OpenAI Chat Block"

- **Block title:** The title for this block
- **Show labels:** Whether or not the names chosen for "Assistant name" and "User name" should appear in the chat UI
- **Source of Truth:** Here you can add a list of questions and answers that the AI will use to accurately respond to queries at the block instance level. Information provided here will only apply to this specific block.
