/*  font-size
--------------------------*/

    (function() {
        tinymce.PluginManager.add('et_font_size', function( editor) {
            editor.addButton( 'et_font_size', {
                title : 'Add font size',
                icon: 'icon icon-font-size',
                onclick: function() {

                    editor.windowManager.open( {
                        title: 'Add font size',
                        body: [
                            {
                                type: 'listbox',
                                name: 'font_size',
                                label: 'Font size',
                                'values': [
                                    {text: '10px', value: '10px'},
                                    {text: '12px', value: '12px'},
                                    {text: '14px', value: '14px'},
                                    {text: '16px', value: '16px'},
                                    {text: '18px', value: '18px'},
                                    {text: '20px', value: '20px'},
                                    {text: '24px', value: '24px'},
                                    {text: '28px', value: '28px'},
                                    {text: '32px', value: '32px'},
                                    {text: '36px', value: '36px'},
                                    {text: '40px', value: '40px'},
                                ]
                            },
                            {
                                type: 'listbox',
                                name: 'line_height',
                                label: 'Line height',
                                'values': [
                                    {text: '10px', value: '10px'},
                                    {text: '12px', value: '12px'},
                                    {text: '14px', value: '14px'},
                                    {text: '16px', value: '16px'},
                                    {text: '18px', value: '18px'},
                                    {text: '20px', value: '20px'},
                                    {text: '24px', value: '24px'},
                                    {text: '28px', value: '28px'},
                                    {text: '32px', value: '32px'},
                                    {text: '36px', value: '36px'},
                                    {text: '40px', value: '40px'},
                                    {text: '48px', value: '48px'},
                                    {text: '56px', value: '56px'},
                                    {text: '64px', value: '64px'},
                                    {text: '72px', value: '72px'},
                                ]
                            }
                        ],
                        onsubmit: function( e ) {
                            var output = '[et_font_size ';
                            var font_size   = e.data.font_size;
                            var line_height = e.data.line_height;

                            output += ' font_size="'+ font_size + '" line_height="'+ line_height + '"]' + editor.selection.getContent() + '[/et_font_size]';
                            
                            editor.insertContent(output);
                        }
                    });
                }
            });
        });
    })();

/*  highlight
--------------------------*/

    (function() {
        tinymce.PluginManager.add('et_highlight', function( editor) {
            editor.addButton( 'et_highlight', {
                title : 'Add highlight',
                icon: 'icon icon-highlight',
                onclick: function() {

                    editor.windowManager.open( {
                        title: 'Add font size',
                        body: [
                            {
                                type: 'textbox',
                                name: 'color',
                                label: 'Color',
                            },
                            {
                                type: 'textbox',
                                name: 'background_color',
                                label: 'Background color',
                            },
                            {
                                type: 'textbox',
                                name: 'border_color',
                                label: 'Border color',
                            },
                            {
                                type: 'listbox',
                                name: 'direction',
                                label: 'Direction',
                                'values': [
                                    {text: 'left', value: 'left'},
                                    {text: 'right', value: 'right'},
                                    {text: 'top', value: 'top'},
                                    {text: 'bottom', value: 'bottom'},
                                ]
                            },
                            {
                                type: 'textbox',
                                name: 'message_color',
                                label: 'Popup message color',
                            },
                            {
                                type: 'textbox',
                                name: 'message_width',
                                label: 'Popup message width',
                            },
                            {
                                type: 'textbox',
                                name: 'message',
                                label: 'Popup message',
                            },
                        ],
                        onsubmit: function( e ) {
            
                            var output = '';
                            var color            = e.data.color;
                            var background_color = e.data.background_color;
                            var border_color     = e.data.border_color;
                            var direction        = e.data.direction;
                            var message_color    = e.data.message_color;
                            var message_width    = e.data.message_width;
                            var message          = e.data.message;

                            var CSS   = '';
                            var element_class = 'et-highlight';

                            if (color.length) {
                                CSS += 'color:'+color+';';
                            }

                            if (background_color.length) {
                                CSS += 'background-color:'+background_color+';';
                                element_class += " back-active";
                            } else {
                                CSS += 'background-color:transparent;';
                            }

                            if (border_color.length) {
                                CSS += 'border-bottom-color:'+border_color+';';
                                element_class += " border-active";
                            }

                            var attributes = [];
                            if (message.length) {
                                attributes.push('data-direction="'+direction+'"');
                                attributes.push('data-width="'+message_width+'"');
                                attributes.push('data-tipso="'+message+'"');
                                attributes.push('data-message-color="'+message_color+'"');
                            }
                            output += '<mark class="'+element_class+'" style="'+CSS+'" '+attributes.join(' ')+'>' + editor.selection.getContent() + '</mark>';
                            
                            editor.insertContent(output);
                        }
                    });
                }
            });
        });
    })();

/*  dropcap
--------------------------*/

    (function() {
        tinymce.PluginManager.add('et_dropcap', function( editor) {
            editor.addButton( 'et_dropcap', {
                title : 'Add dropcap',
                icon: 'icon icon-dropcap',
                onclick: function() {

                    editor.windowManager.open( {
                        title: 'Add font size',
                        body: [
                            {
                                type: 'textbox',
                                name: 'color',
                                label: 'Color',
                            },
                            {
                                type: 'listbox',
                                name: 'type',
                                label: 'Type',
                                'values': [
                                    {text: 'empty', value: 'empty'},
                                    {text: 'full', value: 'full'},
                                ]
                            }
                        ],
                        onsubmit: function( e ) {
                            var output  = '';
                            var color   = e.data.color;
                            var type    = e.data.type;

                            var CSS   = '';
                            var element_class = 'et-dropcap';

                            if (color.length) {
                                if (type == "empty") {
                                    CSS = 'color:'+color+';';
                                } else {
                                    CSS = 'background-color:'+color+';';
                                    element_class += ' full';
                                }
                            }

                            output += '<span class="'+element_class+'" style="'+CSS+'">' + editor.selection.getContent() + '</span>';
                            
                            editor.insertContent(output);
                        }
                    });
                }
            });
        });
    })();