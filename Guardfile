# A sample Guardfile
# More info at https://github.com/guard/guard#readme
require 'guard/plugin'

module ::Guard
    class Behat < ::Guard::Plugin
	def initialize(options = {})
	    defaults = {
		bundles: []
	    }
	    super(defaults.merge(options))
	end
        def run_all
            puts 'Run all Behat tests'
	    options[:bundles].each do |bundle|
              puts `./bin/behat #{bundle}`		
	    end
        end

        def run_on_changes(paths)
            paths.each do |file|
                puts `./bin/behat #{file}`
            end
        end
    end
end

module ::Guard
    class PHPSpec < ::Guard::Plugin
        def run_all
            puts 'Run all PHPSpec tests'
            puts `./bin/phpspec -fpretty run`		
        end

        def run_on_changes(paths)
            paths.each do |file|
                puts `./bin/phpspec -fpretty run #{file}`
            end
        end
    end
end

guard 'phpmd', :rules => 'app/phpmd.xml' do
    watch(%r{^.*\.php$})
end
 
guard 'phpcs', :standard => 'PSR1' do
    watch(%r{^.*\.php$})
end

guard 'behat', :bundles => ['@FerTodoBundle'] do
    watch %r{^src/.*\.feature$}
end


guard 'phpspec' do
    watch(%r{^spec.*\Spec.php$})
end
