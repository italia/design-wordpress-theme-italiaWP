<div class="Header-search italiawp-search" id="header-search">
    <form class="Form" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
        <div class="Form-field Form-field--withPlaceholder Grid u-background-white u-color-grey-30 u-borderRadius-s" role="search">
            <input class="Form-input Form-input--ultraLean Grid-cell u-sizeFill u-text-r-s u-color-black u-text-r-xs u-borderRadius-s"
                   type="text" name="s" id="s" required>
            <label class="Form-label u-color-grey-50 u-text-r-xxs" for="s">Cerca nel sito</label>
            <button class="Grid-cell u-sizeFit Icon-search Icon--rotated u-color-grey-50 u-padding-all-s u-textWeight-700"
                    name="submit" id="searchsubmit" title="Avvia la ricerca" aria-label="Avvia la ricerca">
            </button>
        </div>
    </form>
</div>
