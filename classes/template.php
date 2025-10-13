<?php

class Template {
    protected mixed $file;
    protected array $vars = []; // Holds all the template variables
    protected array $defaults = []; // Default values for common variables

    /*
     * Constructor
     *
     * @param $file string the file name you want to load
     */
    public function __construct($file = null) {
        $this->file = $file;
        $this->initializeDefaults();
    }

    /**
     * Initialize default values for commonly used template variables
     * This prevents undefined variable warnings
     */
    private function initializeDefaults(): void
    {
        $this->defaults = [
            // Navigation variables
            'currzone' => '',
            'currzoneid' => 0,
            'npcid' => 0,

            // Common entity IDs
            'ldid' => 0,
            'ltid' => 0,
            'itemid' => 0,
            'zoneid' => 0,
            'playerid' => 0,
            'acctid' => 0,

            // Common result sets
            'results' => null,
            'variables' => null,
            'mobs' => ['count' => 0, 'mobs' => []],

            // Common UI elements
            'javascript' => '',
            'breadcrumbs' => '',
            'pagetitle' => 'TAKP Database Editor',
        ];
    }

    /*
     * Set a template variable.
     */
    public function set($name, $value): void
    {
        $this->vars[$name] = is_object($value) ? $value->fetch() : $value;
    }


    /**
     * Set multiple template variables at once
     *
     * @param array $vars Associative array of variable names and values
     */
    public function setMultiple(array $vars): void
    {
        foreach ($vars as $name => $value) {
            $this->set($name, $value);
        }
    }

    /*
     * Open, parse, and return the template file.
     *
     * @param $file string the template file name
     */
    public function fetch($file = null): bool|string
    {
        if(empty($file) || !file_exists($file)) {
            $file = $this->file;
        }

        // Merge defaults with set variables (set variables take precedence)
        $templateVars = array_merge($this->defaults, $this->vars);

        if (!empty($templateVars)) {
            extract($templateVars, EXTR_SKIP);  // Extract the vars to local namespace with safety flag
        }
        ob_start();                    // Start output buffering
        include($file);                // Include the file
        $contents = ob_get_contents(); // Get the contents of the buffer
        ob_end_clean();                // End buffering and discard
        return $contents;              // Return the contents
    }

    /**
     * Debug: List all variables available to the template
     */
    public function debugVars(): array
    {
        return array_merge($this->defaults, $this->vars);
    }
}

$tmpl = new Template;

?>
